<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class AnimeController extends Controller
{
    public function store()
    {
        $contador = 1;
        $allAnimes = array();

        $client = new Client();
        do {
            try {
                $response = $client->request('GET', 'https://api.jikan.moe/v4/anime/' . $contador . '/full');
                $responseAnime = json_decode($response->getBody())->{'data'};

                if (!empty($responseAnime->{'genres'})) {
                    $genre = strtolower($responseAnime->{'genres'}[0]->{'name'});
                    switch ($genre) {
                        case "action":
                            $responseAnime->{'genres'} = 1;
                            break;
                        case "adventure":
                            $responseAnime->{'genres'} = 2;
                            break;
                        case "comedy":
                            $responseAnime->{'genres'} = 3;
                            break;
                        case "drama":
                            $responseAnime->{'genres'} = 4;
                            break;
                        case "fantasy":
                            $responseAnime->{'genres'} = 5;
                            break;
                        case "horror":
                            $responseAnime->{'genres'} = 6;
                            break;
                        case "mystery":
                            $responseAnime->{'genres'} = 7;
                            break;
                        case "romance":
                            $responseAnime->{'genres'} = 8;
                            break;
                        case "sci-fi":
                            $responseAnime->{'genres'} = 9;
                            break;
                        case "suspense":
                            $responseAnime->{'genres'} = 10;
                            break;
                        case "mecha":
                            $responseAnime->{'genres'} = 11;
                            break;
                        case "samurai":
                            $responseAnime->{'genres'} = 12;
                            break;
                        case "josei":
                            $responseAnime->{'genres'} = 13;
                            break;
                        case "seinen":
                            $responseAnime->{'genres'} = 14;
                            break;
                        case "shoujo":
                            $responseAnime->{'genres'} = 15;
                            break;
                        case "shounen":
                            $responseAnime->{'genres'} = 16;
                            break;
                        case "animation":
                            $responseAnime->{'genres'} = 17;
                            break;
                        case "organized crime":
                            $responseAnime->{'genres'} = 18;
                            break;
                        case "family":
                            $responseAnime->{'genres'} = 19;
                            break;
                        case "science fiction":
                            $responseAnime->{'genres'} = 20;
                            break;
                        case "war":
                            $responseAnime->{'genres'} = 21;
                            break;
                        default:
                            $responseAnime->{'genres'} = 17;
                            break;
                    }
                }                
                $durationParts = explode(' ', $responseAnime->{'duration'});
                $responseAnime->{'duration'} = $durationParts[0];
                $responseAnime->{'score'} = round($responseAnime->{'score'});

                $allAnimes[] = $responseAnime;
                if ($contador % 3 == 0) {
                    sleep(1);
                }
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }
            $contador++;
        } while ($contador < 500);

        return $allAnimes;
    }

    public function returnAnimes($id)
    {
        $user = Auth::user()->id;

        $anime = Anime::find($id);
        $userLists = FavouriteLists::query()->where('user_id', $user)->get();
        $userListsWhereAnime = [];
        $userAnimeInLists = FavoriteList::query()->where('user_id', $user)->where('anime_id', $id)->get();
        $contentRate = substr(Rating::where('anime_id', $id)->avg('rate'), 0, 4);
        $totalVotes = Rating::where('anime_id', $id)->count();
        $userVoteExists = Rating::where('user_id', $user)->where('anime_id', $id)->first();

        foreach ($userAnimeInLists as $animeInLists) {
            foreach ($userLists as $list) {
                if ($list->id == $animeInLists->list_id) {
                    array_push($userListsWhereAnime, $list);
                }
            }
        }
        //dd($userListsWhereAnime);
        $userTopList = FavouriteLists::query()->where('user_id', $user)->where('top_list', 1)->get();
        $comments = Review::where('anime_id', '=', $id)->get();
        $shareComponent = $this->ShareWidget();


        if (!is_null($anime)) {
            return view('/detail.detailAnimes', compact('anime', 'userLists', 'userListsWhereAnime', 'comments', 'shareComponent', 'userTopList', 'contentRate', 'userVoteExists', 'totalVotes'));
            //return view('/detail.detailAnimes', compact('anime', 'userLists', 'comments', 'shareComponent'));
        } else {
            return response('No encontrado', 404);
        }
    }

    public function addFavourite($id, $list)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::query()->where('user_id', $user)->where('anime_id', $id)->where('list_id', $list)->get();
        $anime_name = Anime::query()->where('id', $id)->get();

        if (!isset($lista[0])) {
            $fav = FavoriteList::create([
                'user_id' => $user,
                'anime_id' => $id,
                'list_id' => $list
            ]);
            return redirect()->to('/detail/detailAnimes/' . $id)->with('AnimeAdded', 'Se ha añadido ' . $anime_name[0]->name . ' a tu lista de favoritos');
        }
        return redirect()->to('/detail/detailAnimes/' . $id);
    }

    public function delFavourite($idA, $list)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::where('user_id', $user)->where('anime_id', $idA)->where('list_id', $list)->first();
        $lista->delete();
        $anime_name = Anime::query()->where('id', $idA)->get();

        return redirect()->to('/detail/detailAnimes/' . $idA)->with('AnimeDeleted', 'Se ha eliminado ' . $anime_name[0]->name . ' de tu lista de favoritos');
    }

    public function addNewList($idAnime, Request $request)
    {
        $user = Auth::user()->id;
        $newListName = $request->input('newListName');
        $listUser = FavouriteLists::where('name', $newListName)->where('user_id', $user)->get('id')->max();
        $anime_name = Anime::query()->where('id', $idAnime)->get();

        $request->validate([
            'newListName' => 'required|string|min:2|max:255'
        ]);

        if (empty($listUser)) {
            $newlist = FavouriteLists::create([
                'name' => $newListName,
                'user_id' => $user,
            ]);
            $idList = FavouriteLists::where('name', $newListName)->get('id')->max();
            $this->addFavourite($idAnime, $idList->id);
            return redirect()->to('/detail/detailAnimes/' . $idAnime)->with('AnimeAdded', 'Se ha añadido ' . $anime_name[0]->name . ' a tu lista de favoritos');
        } else {
            return redirect()->to('/detail/detailAnimes/' . $idAnime);
        }
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

    public function fetchAllAnimes()
    {
        $animes = Anime::paginate(100);
        $allAnimes = Anime::all();

        $filterGenres = ["Samurai", "Shounen", "Seinen", "Shoujo", "Demons", "Sci-Fi", "Mecha", "Josei"];
        $genres = Genre::whereIn('name', $filterGenres)->get();

        foreach ($genres as $genre) {
            $genre->name = strtolower($genre->name); //para que me pille las traducciones en el blade.php
            if ($genre->name == 'sci-fi' || $genre->name == 'Sci-Fi') {
                $genre->name = 'scifi';
            }
        }
        $otherGenres = [];
        $otherGenres['action_adventure'] = 'action';
        //$otherGenres['animation_family'] = 'animation';
        $otherGenres['comedy'] = 'comedy';
        $otherGenres['terror_thriller'] = 'terror';
        $otherGenres['romance'] = 'romance';
        $otherGenres['scifi_fantasy'] = 'fiction';
        $otherGenres['drama_mistery'] = 'drama';
        $otherGenres['war_crime'] = 'crime';
        $otherGenres['unknown'] = 'unknown';

        return view(
            'content.contentAnimes',
            [
                'animes' => $animes,
                'allAnimes' => $allAnimes,
                'genres' => $genres,
                'otherGenres' => $otherGenres
            ]
        );
    }

    public function filterContent($genre = null)
    {
        if (isset($genre) && !is_null($genre) && !empty($genre)) {

            if ($genre == 'scifi') {
                $genre = 'sci-fi';
            }

            $animes = Anime::select('animes.*')
                ->join('genres', 'animes.genre_id', '=', 'genres.id')
                ->where('genres.name', '=', $genre)
                ->orderBy('animes.name', 'asc')
                ->paginate(25);

            return view('content.filterAnime', ['animes' => $animes, 'genre' => $genre]);
        }
    }

    public function postRatingAnime($id, Request $request)
    {
        $user = Auth::user()->id;

        $userRate = $request->input('stars');
        $checkUserRate = Rating::where('user_id', $user)->where('anime_id', $id)->first();

        if (!isset($checkUserRate)) {
            $rate = Rating::create([
                'user_id' => $user,
                'anime_id' => $id,
                'rate' => $userRate,
            ]);
            return redirect()->to('/detail/detailAnimes/' . $id)->with('RateAdded', 'Se ha añadido tu voto.');
        }
        return redirect()->to('/detail/detailAnimes/' . $id);
    }
}
