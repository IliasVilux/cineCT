<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;
use App\Models\Like;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    private $tmdb_api_key;

    public function __construct()
    {
        $this->tmdb_api_key = env('TMDB_API_KEY');
    }

    public function store()
    {

        $contador = 1;
        $allFilms = array();
        $genreMap = [
            10759 => 1,  // Action & Adventure -> Action
            16 => 17,    // Animation -> Animation
            35 => 3,     // Comedy -> Comedy
            80 => 18,    // Crime -> Crime
            99 => 2,     // Documentary -> Adventure
            18 => 4,     // Drama -> Drama
            10751 => 19, // Family -> Family
            10762 => 2,  // Kids -> Adventure
            9648 => 7,   // Mystery -> Mystery
            10763 => 10, // News -> Suspense
            10764 => 9,  // Reality -> Sci-Fi
            10765 => 9,  // Sci-Fi & Fantasy -> Sci-Fi
            10766 => 15, // Soap -> Shoujo
            10767 => 10, // Talk -> Suspense
            10768 => 21, // War & Politics -> War
            37 => 1     // Western -> Action
        ];

        $client = new Client();
        do {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie', [
                'query' => [
                    'language' => 'en-US',
                    'page' => $contador,
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->tmdb_api_key,
                    'Accept' => 'application/json',
                ],
            ]);

            $responseMovies = json_decode($response->getBody())->{'results'};

            foreach ($responseMovies as $movie)
            {
                $responseDetail = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $movie->{'id'} . '?language=es-ES', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->tmdb_api_key,
                        'Accept' => 'application/json',
                    ],
                ]);
                $jsonDetail = json_decode($responseDetail->getBody());
                if (isset($jsonDetail->{'genres'}) && !empty($jsonDetail->{'genres'})){
                    $firstGenreId = $jsonDetail->{'genres'}[0]->{'id'};
                    if (array_key_exists($firstGenreId, $genreMap)) {
                        $movie->{'genre_ids'} = $genreMap[$firstGenreId];
                    } else {
                        $movie->{'genre_ids'} = null; 
                    }
                } else {
                    $movie->{'genre_ids'} = null;
                }

                if (property_exists($jsonDetail, 'runtime') && !is_null($jsonDetail->{'runtime'})) {
                    $movie->{'duration'} = $jsonDetail->{'runtime'};
                } else {
                    $movie->{'duration'} = null;
                }
                if (!empty($movie->{'release_date'})){
                    $movie->{'release_date'} = substr($movie->{'release_date'}, 0, 4);
                } else {
                    $movie->{'release_date'} = null;
                }
                $allFilms[] = $movie;
            }

            $contador++;
        } while ($contador < 15);

        return $allFilms;
    }

    public function returnFilms($id, $orderByLikes = null)
    {
        $user = Auth::user()->id;

        $film = Film::find($id);
        $userLists = FavouriteLists::query()->where('user_id', $user)->get();
        $userTopList = FavouriteLists::query()->where('user_id', $user)->where('top_list', 1)->get();
        $comments = Review::where('film_id', '=', $id)->get();
        $shareComponent = $this->ShareWidget();
        $userListsWhereFilm = [];
        $userFilmsInLists = FavoriteList::where('user_id', $user)->where('film_id', $id)->get();
        $contentRate = substr(Rating::where('film_id', $id)->avg('rate'), 0, 4);
        $totalVotes = Rating::where('film_id', $id)->count();
        $userVoteExists = Rating::where('user_id', $user)->where('film_id', $id)->first();
        foreach($userFilmsInLists as $filmInLists)
        {
            foreach($userLists as $list)
            {
                if($list->id == $filmInLists->list_id){
                    array_push($userListsWhereFilm, $list);
                }
            }
        }

        $commentsOrderByLikes = [];

        if (!is_null($film)) {
            if(isset($orderByLikes) && !is_null($orderByLikes) && $orderByLikes === 'order') {
                if(count($comments) !== 0){
                    foreach($comments as $comment){
                        $currentCommentTotalLikes = Like::where('review_id', $comment->id)->count();               
                        $commentsOrderByLikes[$comment->id]['likes'] = $currentCommentTotalLikes;
                        $commentsOrderByLikes[$comment->id]['comments'] = $comment;
                    }
                }   
                arsort($commentsOrderByLikes);
                return view('detail.detailFilms', compact('film', 'userLists', 'userListsWhereFilm', 'comments', 'shareComponent', 'userTopList', 'commentsOrderByLikes', 'contentRate', 'userVoteExists', 'totalVotes'));
            }
            return view('detail.detailFilms', compact('film', 'userLists', 'userListsWhereFilm', 'comments', 'shareComponent', 'userTopList', 'contentRate', 'userVoteExists', 'totalVotes'));
        } else {
            return response('No encontrado', 404);
        }
    }

    public function addFavourite($id, $list)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::query()->where('user_id', $user)->where('film_id', $id)->get();
        $film_name = Film::query()->where('id', $id)->get();

        if (!isset($lista[0])) {
            $fav = FavoriteList::create([
                'user_id' => $user,
                'film_id' => $id,
                'list_id' => $list
            ]);
            return redirect()->to('/detail/detailFilms/' . $id)->with('FilmAdded', 'Se ha añadido ' . $film_name[0]->name . ' a tu lista de favoritos');
        }
        return redirect()->to('/detail/detailFilms/' . $id);
    }

    public function delFavourite($idF, $list)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::where('user_id', $user)->where('film_id', $idF)->where('list_id', $list)->first();
        $lista->delete();
        $film_name = Film::query()->where('id', $idF)->get();

        return redirect()->to('/detail/detailFilms/' . $idF)->with('FilmDeleted','Se ha eliminado ' . $film_name[0]->name . ' de tu lista de favoritos');
    }

    public function addNewList($idFilm, Request $request)
    {
        $user = Auth::user()->id;
        $newListName = $request->input('newListName');
        $listUser = FavouriteLists::where('name', $newListName)->where('user_id', $user)->get('id')->max();
        $film_name = Film::query()->where('id', $idFilm)->get();

        $request->validate([
            'newListName' => 'required|string|min:2|max:255'
        ]);

        if(empty($listUser))
        {
            $newlist = FavouriteLists::create([
                'name' => $newListName,
                'user_id' => $user,
            ]);
            $idList = FavouriteLists::where('name', $newListName)->get('id')->max();
            $this->addFavourite($idFilm, $idList->id);
            return redirect()->to('/detail/detailFilms/' . $idFilm)->with('FilmAdded','Se ha añadido ' . $film_name[0]->name . ' a tu lista de favoritos');
        } else { return redirect()->to('/detail/detailFilms/' . $idFilm); }
    }

    public function ShareWidget()
    {
        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $shareComponent = \Share::page(
            $url, // Link que se comparte
            '', // Texto de compartir
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        return $shareComponent;
    }

    public function fetchAllFilms()
    {
        $films = Film::orderBy('release_date', 'DESC')->paginate(100);
        $allFilms = Film::all();

        $genres = [];
        $genres['action_adventure'] = 'action';
        $genres['animation_family'] = 'animation';
        $genres['comedy'] = 'comedy';
        $genres['terror_thriller'] = 'terror';
        $genres['romance'] = 'romance';
        $genres['scifi_fantasy'] = 'fiction';
        $genres['drama_mistery'] = 'drama';
        $genres['war_crime'] = 'crime';

        return view('content.contentFilms', ['films' => $films, 'genres' => $genres, 'allFilms' => $allFilms]);
    }

    public function filterContent($genre = null)
    {

        if (isset($genre) && !is_null($genre) && !empty($genre)) {

            $searchCondition = array();

            if ($genre == 'Action' || $genre == 'action') {
                array_push($searchCondition, "Action", "Adventure");
            } elseif ($genre == 'Animation' || $genre == 'animation') {
                array_push($searchCondition, "Animation", "Family");
            } elseif ($genre == 'Comedy' || $genre == 'comedy') {
                array_push($searchCondition, "Comedy");
            } elseif ($genre == 'Terror' || $genre == 'terror') {
                array_push($searchCondition, "Horror", "Thriller", "Suspense");
            } elseif ($genre == 'Romance' || $genre == 'romance') {
                array_push($searchCondition, "Romance");
            } elseif ($genre == 'Fiction' || $genre == 'fiction') {
                array_push($searchCondition, "Science Fiction", "Fantasy");
            } elseif ($genre == 'Drama' || $genre == 'drama' || $genre == 'Mystery' || $genre == 'mystery') {
                array_push($searchCondition, "Drama", "Mystery");
            } elseif ($genre == 'War' || $genre == 'war' || $genre == 'Crime' || $genre == 'crime') {
                array_push($searchCondition, "War", "Crime");
            }
           
            $films = Film::select('films.*')
                ->join('genres', 'films.genre_id', '=', 'genres.id')
                ->whereIn('genres.name', $searchCondition)
                ->orderBy('films.release_date', 'DESC')
                ->paginate(25);

            return view('content.filterFilm', ['films' => $films, 'genre' => $genre]);
        }
    }

    public function postRatingFilm($id, Request $request)
    {
        $user = Auth::user()->id;

        $userRate = $request->input('stars');
        $checkUserRate = Rating::where('user_id', $user)->where('film_id', $id)->first();

        if(!isset($checkUserRate))
        {
            $rate = Rating::create([
                'user_id' => $user,
                'film_id' => $id,
                'rate' => $userRate,
            ]);
            return redirect()->to('/detail/detailFilms/' . $id)->with('RateAdded', 'Se ha añadido tu voto.');
        } return redirect()->to('/detail/detailFilms/' . $id);
    }

    
}
