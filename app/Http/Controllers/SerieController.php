<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Serie;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SerieController extends Controller
{
    private $tmdb_api_key;

    public function __construct()
    {
        $this->tmdb_api_key = env('TMDB_API_KEY');
    }

    public function store(){    
        $contador = 1;
        $allSeries = array();
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
        do{
            $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/tv', [
                'query' => [
                    'language' => 'en-US',
                    'page' => $contador,
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->tmdb_api_key,
                    'Accept' => 'application/json',
                ],
            ]);

            $responseSeries = json_decode($response->getBody())->{'results'};

            foreach ($responseSeries as $serie)
            {
                $responseDetail = $client->request('GET', 'https://api.themoviedb.org/3/tv/' . $serie->{'id'} . '?language=es-ES', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->tmdb_api_key,
                        'Accept' => 'application/json',
                    ],
                ]);
                $jsonDetail = json_decode($responseDetail->getBody());
                $serie->{'season_number'} = $jsonDetail->{'number_of_seasons'};
                $serie->{'episode_count'} = $jsonDetail->{'number_of_episodes'};

                if (isset($serie->{'genre_ids'}) && !empty($serie->{'genre_ids'})){
                    $firstGenreId = $serie->{'genre_ids'}[0];
                    if (array_key_exists($firstGenreId, $genreMap)) {
                        $serie->{'genre_ids'} = $genreMap[$firstGenreId];
                    } else {
                        $serie->{'genre_ids'} = null; 
                    }
                } else {
                    $serie->{'genre_ids'} = null;
                }
                $serie->{'vote_average'} = intval($serie->{'vote_average'});
                if (!empty($serie->{'first_air_date'})){
                    $serie->{'first_air_date'} = substr($serie->{'first_air_date'}, 0, 4);
                } else {
                    $serie->{'first_air_date'} = null;
                }
                if (!empty($serie->{'poster_path'}))
                {
                    $allSeries[] = $serie;
                }

            }

            $contador++;
        }while($contador < 105);

        return $allSeries;
    }

    public function returnSeries($id) {
        $user = Auth::user()->id;

        $serie = Serie::find($id);
        $userLists = FavouriteLists::query()->where('user_id', $user)->get();
        $userListsWhereSerie = [];
        $userSeriesInLists = FavoriteList::where('user_id', $user)->where('serie_id', $id)->get();
        $contentRate = substr(Rating::where('serie_id', $id)->avg('rate'), 0, 4);
        $totalVotes = Rating::where('serie_id', $id)->count();
        $userVoteExists = Rating::where('user_id', $user)->where('serie_id', $id)->first();
        foreach($userSeriesInLists as $SerieInLists)
        {
            foreach($userLists as $list)
            {
                if($list->id == $SerieInLists->list_id){
                    array_push($userListsWhereSerie, $list);
                }
            }
        }
        $userTopList = FavouriteLists::query()->where('user_id', $user)->where('top_list', 1)->get();

        $comments = Review::where('serie_id' ,'=', $id)->get();
        $shareComponent = $this->ShareWidget();

        if (!is_null($serie)) {
            return view('/detail/detailSeries', compact('serie', 'userLists', 'userListsWhereSerie', 'userTopList', 'comments', 'shareComponent', 'contentRate', 'userVoteExists', 'totalVotes'));
        } else {
            return response('No encontrado', 404);
        }
    }

    public function addFavourite($id, $list)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::query()->where('user_id', $user)->where('serie_id', $id)->get();
        $serie_name = Serie::query()->where('id', $id)->get();

        if(!isset($lista[0])){
            $fav = FavoriteList::create([
                'user_id' => $user,
                'serie_id' => $id,
                'list_id' => $list,
            ]);
            return redirect()->to('/detail/detailSeries/' . $id)->with('SerieAdded','Se ha añadido ' . $serie_name[0]->name . ' a tu lista de favoritos');
        }
        return redirect()->to('/detail/detailSeries/' . $id);
    }

    public function delFavourite($idS, $list)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::where('user_id', $user)->where('serie_id', $idS)->where('list_id', $list)->first();
        $lista->delete();
        $serie_name = Serie::query()->where('id', $idS)->get();

        return redirect()->to('/detail/detailSeries/' . $idS)->with('SerieDeleted','Se ha eliminado ' . $serie_name[0]->name . ' de tu lista de favoritos');
    }

    public function addNewList($idSerie, Request $request)
    {
        $user = Auth::user()->id;
        $newListName = $request->input('newListName');
        $listUser = FavouriteLists::where('name', $newListName)->where('user_id', $user)->get('id')->max();
        $serie_name = Serie::query()->where('id', $idSerie)->get();

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
            $this->addFavourite($idSerie, $idList->id);
            return redirect()->to('/detail/detailSeries/' . $idSerie)->with('SerieAdded','Se ha añadido ' . $serie_name[0]->name . ' a tu lista de favoritos');
        } else { return redirect()->to('/detail/detailSeries/' . $idSerie); }
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

    public function fetchAllSeries()
    {
        $series = Serie::orderBy('release_date', 'DESC')->paginate(100);
        $allSeries = Serie::all();

        $genres = [];
        $genres['action_adventure'] = 'action';
        $genres['animation_family'] = 'animation';
        $genres['comedy'] = 'comedy';
        $genres['terror_thriller'] = 'terror';
        $genres['romance'] = 'romance';
        $genres['scifi_fantasy'] = 'fiction';
        $genres['drama_mistery'] = 'drama';
        $genres['war_crime'] = 'crime';
        

        return view('content.contentSeries', ['series' => $series, 'allSeries' => $allSeries, 'genres' => $genres]);
    }

    public function filterContent($genre = null)
    {

        if(isset($genre) && !is_null($genre) && !empty($genre)){
            
            $searchCondition = array();
            
            if($genre == 'Action' || $genre == 'action'){
                array_push($searchCondition, "Action","Adventure"); 
            }elseif ($genre == 'Animation' || $genre == 'animation'){
                array_push($searchCondition, "Animation","Family"); 
            }elseif($genre == 'Comedy' || $genre == 'comedy'){
                array_push($searchCondition, "Comedy"); 
            }elseif ($genre == 'Terror' || $genre == 'terror'){
                array_push($searchCondition, "Horror", "Thriller"); 
            }elseif($genre == 'Romance' || $genre == 'romance'){
                array_push($searchCondition, "Romance"); 
            }elseif ($genre == 'Fiction' || $genre == 'fiction'){
                array_push($searchCondition, "Sci-fi", "Fantasy", "Science Fiction");
            }elseif ($genre == 'Drama' || $genre == 'drama'){
                array_push($searchCondition, "Drama", "Mystery");
            }elseif ($genre == 'War' || $genre == 'war' || $genre == 'Crime' || $genre == 'crime'){
                array_push($searchCondition, "War", "Crime");
            }

            $series = Serie::select('series.*')
            ->join('genres', 'series.genre_id', '=', 'genres.id')
            ->whereIn('genres.name', $searchCondition)
            ->orderBy('series.release_date', 'DESC')
            ->paginate(25);

            
            //dd(count($films) > 0);

            return view('content.filterSerie',['series' => $series, 'genre' => $genre]);
            
            
        }
        
    }

    public function postRatingSerie($id, Request $request)
    {
        $user = Auth::user()->id;

        $userRate = $request->input('stars');
        $checkUserRate = Rating::where('user_id', $user)->where('serie_id', $id)->first();

        if(!isset($checkUserRate))
        {
            $rate = Rating::create([
                'user_id' => $user,
                'serie_id' => $id,
                'rate' => $userRate,
            ]);
            return redirect()->to('/detail/detailSeries/' . $id)->with('RateAdded', 'Se ha añadido tu voto.');
        } return redirect()->to('/detail/detailSeries/' . $id);
    }
}