<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class SerieController extends Controller
{
    public static function store(){
        
        $contador = 1;
        $apiLinks = array();
        $allSeries = array();

        do{
            //$serieApi = Http::get('https://api.themoviedb.org/3/tv/' .$contador. '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
            $serieApi = Http::get('https://api.themoviedb.org/' . $contador . '/discover/tv?api_key=9d981b068284aca44fb7530bdd218c30&with_genres=10759');
            //genres //https://api.themoviedb.org/3/genre/movie/list?api_key=9d981b068284aca44fb7530bdd218c30&language=en-US
            array_push($apiLinks, $serieApi);
            $contador++;
        }while($contador < 20);
        
        foreach($apiLinks as $link) {
            $serieJson = json_decode($link);
            /*
            if (!empty($serieJson->{'genres'})){
                $genreName = $serieJson->{'genres'}[0]->{'name'};
                if($genreName == "Action") {
                    $serieJson->{'genres'}[0]->{'name'} = 1;
                }else if($genreName == "Adventure"){
                    $serieJson->{'genres'}[0]->{'name'} = 2;
                }else if($genreName == "Comedy"){
                    $serieJson->{'genres'}[0]->{'name'} = 3;                
                }else if($genreName == "Drama"){
                    $serieJson->{'genres'}[0]->{'name'} = 4;  
                }else if($genreName == "Fantasy"){
                    $serieJson->{'genres'}[0]->{'name'} = 5;                
                }else if($genreName == "Horror"){
                    $serieJson->{'genres'}[0]->{'name'} = 6;                
                }else if($genreName == "Mystery"){
                    $serieJson->{'genres'}[0]->{'name'} = 7;                
                }else if($genreName == "Romance"){
                    $serieJson->{'genres'}[0]->{'name'} = 8;                
                }else if($genreName == "Sci-Fi"){
                    $serieJson->{'genres'}[0]->{'name'} = 9;                
                }else if($genreName == "Suspense"){
                    $serieJson->{'genres'}[0]->{'name'} = 10;                
                }else if($genreName == "Demons"){
                    $serieJson->{'genres'}[0]->{'name'} = 11;                
                }else if($genreName == "Mecha"){
                    $serieJson->{'genres'}[0]->{'name'} = 12;                
                }else if($genreName == "Samurai"){
                    $serieJson->{'genres'}[0]->{'name'} = 13;                
                }else if($genreName == "Josei"){
                    $serieJson->{'genres'}[0]->{'name'} = 14;                
                }else if($genreName == "Seinen"){
                    $serieJson->{'genres'}[0]->{'name'} = 15;                
                }else if($genreName == "Shoujo"){
                    $serieJson->{'genres'}[0]->{'name'} = 16;                
                }else if($genreName == "Shounen"){
                    $serieJson->{'genres'}[0]->{'name'} = 17;                
                }else if($genreName == "Animation"){
                    $serieJson->{'genres'}[0]->{'name'} = 18;                
                }else if($genreName == "Crime"){
                    $serieJson->{'genres'}[0]->{'name'} = 19;                
                }else if($genreName == "Family"){
                    $serieJson->{'genres'}[0]->{'name'} = 20;                
                }else if($genreName == "Science Fiction"){
                    $serieJson->{'genres'}[0]->{'name'} = 21;                
                }else if($genreName == "War"){
                    $serieJson->{'genres'}[0]->{'name'} = 22;
                }else{
                    $serieJson->{'genres'}[0]->{'name'} = 23;
                }
            }
            */
            if (isset($serieJson->{'results'})) {
                array_push($allSeries, $serieJson);
            }
            
        }

        foreach ($allSeries as $serieContent) {

            $count = count($serieContent->{'results'});

            for ($i = 0; $i < $count; $i++) {

                if($serieContent->{'results'}[$i]->{'origin_country'}[0] !== 'JP') {

                    $serieContent->{'results'}[$i]->{'first_air_date'} = substr($serieContent->{'results'}[$i]->{'first_air_date'}, 0, 4);
                    $serieContent->{'results'}[$i]->{'poster_path'} = 'https://image.tmdb.org/t/p/w500' . $serieContent->{'results'}[$i]->{'poster_path'};

                    
                    echo 'Nombre; ' . $serieContent->{'results'}[$i]->{'name'} . '<br>';
                    echo 'description: ' . $serieContent->{'results'}[$i]->{'overview'} . '<br>';
                    echo "poster_path: <a href='" . $serieContent->{'results'}[$i]->{'poster_path'} . "' target='blank_'>Foto</a><br>";
                    echo 'puntuation:' . $serieContent->{'results'}[$i]->{'vote_average'} . '<br>';
                    echo 'release_date: ' . $serieContent->{'results'}[$i]->{'first_air_date'} . '<br><br>';
                    
                    
                }
            }
            break;
        }

        //die();
        return $allSeries;

    }

    public function returnSeries($id) {
        $serie = Serie::find($id);
        $comments = Review::where('serie_id' ,'=', $id)->get();
        $shareComponent = $this->ShareWidget();

        if (!is_null($serie)) {
            return view('/detail/detailSeries', compact('serie', 'comments', 'shareComponent'));
        } else {
            return response('No encontrado', 404);
        }
    }

    public function addFavourite($id)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::query()->where('user_id', $user)->where('serie_id', $id)->get();
        $serie_name = Serie::query()->where('id', $id)->get();

        if(!isset($lista[0])){
            $fav = FavoriteList::create([
                'user_id' => $user,
                'serie_id' => $id
            ]);
            return redirect()->to('/detail/detailSeries/' . $id)->with('SerieAdded','Se ha añadido ' . $serie_name[0]->name . ' a tu lista de favoritos');
        }
        return redirect()->to('/detail/detailSeries/' . $id);
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
        $series = Serie::paginate(100);
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
                array_push($searchCondition, "Sci-fi", "Fantasy");
            }elseif ($genre == 'Drama' || $genre == 'drama'){
                array_push($searchCondition, "Drama", "Mystery");
            }elseif ($genre == 'War' || $genre == 'war'){
                array_push($searchCondition, "War", "Crime");
            }

            $series = Serie::select('series.*')
            ->join('genres', 'series.genre_id', '=', 'genres.id')
            ->whereIn('genres.name', $searchCondition)
            ->orderBy('series.name', 'asc')
            ->paginate(25);

            
            //dd(count($films) > 0);

            return view('content.filterSerie',['series' => $series, 'genre' => $genre]);
            
            
        }
        
    }
}