<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public static function store(){
        
        $contador = 1;
        $apiLinks = array();
        $allFilms = array();

        do{
            $filmApi = Http::get('https://api.themoviedb.org/3/movie/' . $contador . '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-US');
            array_push($apiLinks, $filmApi);
            $contador++;
        }while($contador < 20);
        
        foreach($apiLinks as $link) {
            $filmJson = json_decode($link);
            if (isset($filmJson->{'id'})){
                $genreName = $filmJson->{'genres'}[0]->{'name'};
                if($genreName == "Action") {
                    $filmJson->{'genres'}[0]->{'name'} = 1;
                }else if($genreName == "Adventure"){
                    $filmJson->{'genres'}[0]->{'name'} = 2;
                }else if($genreName == "Comedy"){
                    $filmJson->{'genres'}[0]->{'name'} = 3;                
                }else if($genreName == "Drama"){
                    $filmJson->{'genres'}[0]->{'name'} = 4;  
                }else if($genreName == "Fantasy"){
                    $filmJson->{'genres'}[0]->{'name'} = 5;                
                }else if($genreName == "Horror"){
                    $filmJson->{'genres'}[0]->{'name'} = 6;                
                }else if($genreName == "Mystery"){
                    $filmJson->{'genres'}[0]->{'name'} = 7;                
                }else if($genreName == "Romance"){
                    $filmJson->{'genres'}[0]->{'name'} = 8;                
                }else if($genreName == "Sci-Fi"){
                    $filmJson->{'genres'}[0]->{'name'} = 9;                
                }else if($genreName == "Suspense"){
                    $filmJson->{'genres'}[0]->{'name'} = 10;                
                }else if($genreName == "Demons"){
                    $filmJson->{'genres'}[0]->{'name'} = 11;                
                }else if($genreName == "Mecha"){
                    $filmJson->{'genres'}[0]->{'name'} = 12;                
                }else if($genreName == "Samurai"){
                    $filmJson->{'genres'}[0]->{'name'} = 13;                
                }else if($genreName == "Josei"){
                    $filmJson->{'genres'}[0]->{'name'} = 14;                
                }else if($genreName == "Seinen"){
                    $filmJson->{'genres'}[0]->{'name'} = 15;                
                }else if($genreName == "Shoujo"){
                    $filmJson->{'genres'}[0]->{'name'} = 16;                
                }else if($genreName == "Shounen"){
                    $filmJson->{'genres'}[0]->{'name'} = 17;                
                }else if($genreName == "Animation"){
                    $filmJson->{'genres'}[0]->{'name'} = 18;                
                }else if($genreName == "Crime"){
                    $filmJson->{'genres'}[0]->{'name'} = 19;                
                }else if($genreName == "Family"){
                    $filmJson->{'genres'}[0]->{'name'} = 20;                
                }else if($genreName == "Science Fiction"){
                    $filmJson->{'genres'}[0]->{'name'} = 21;                
                }else if($genreName == "War"){
                    $filmJson->{'genres'}[0]->{'name'} = 22;
                }else{
                    $filmJson->{'genres'}[0]->{'name'} = 23;
                }
                $filmJson->{'release_date'} = (int)substr($filmJson->{'release_date'}, 0, -5);
                array_push($allFilms, $filmJson);
            }
        }

        return $allFilms;

    }

    public function returnFilms($id) {
        $film = Film::find($id);
        $profile = Image::all();
        $comments = Review::where('film_id' ,'=', $id)->get();
        $shareComponent = $this->ShareWidget();
        
        if (!is_null($film)) {
            return view('detail.detailFilms', compact('film', 'comments', 'profile', 'shareComponent'));
        } else {
            return response('No encontrado', 404);
        }
    }

    public function addFavourite($id)
    {
        $user = Auth::user()->id;
        $lista = FavoriteList::query()->where('user_id', $user)->where('film_id', $id)->get();
        $film_name = Film::query()->where('id', $id)->get();

        if(!isset($lista[0])){
            $fav = FavoriteList::create([
                'user_id' => $user,
                'film_id' => $id
            ]);
            return redirect()->to('/detail/detailFilms/' . $id)->with('FilmAdded','Se ha añadido ' . $film_name[0]->name . ' a tu lista de favoritos');
        }
        return redirect()->to('/detail/detailFilms/' . $id);
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
    

   /* public function returnFilmGenre($genre_id) {
  
        if (!is_null($filmGenre)) {
            return view('/content/contentFilms', ['filmGenre' => $filmGenre]);
        } else {
            return response('No encontrado', 404);
        }
    }*/

    public function fetchAllFilms()
    {
        $films = Film::paginate(100);

        //$filmGenres = ["Animation", "Family", "Science Fiction", "War", "Crime", "Action", "Adventure", "Comedy", "Drama", "Fantasy", "Horror", "Mystery", "Romance", "Suspense"];
        
        //$genres = Genre::whereIn('name', $filmGenres)->get();

        $genres = [];
        $genres['action_adventure'] = 'action';
        $genres['animation_family'] = 'animation';
        $genres['comedy'] = 'comedy';
        $genres['terror_thriller'] = 'terror';
        $genres['romance'] = 'romance';
        $genres['scifi_fantasy'] = 'fiction';
        $genres['drama_mistery'] = 'drama';
        $genres['war_crime'] = 'crime';
//jeowjf
       
        return view('content.contentFilms', ['films' => $films, 'genres' => $genres]);
    }

    public function filterContent($genre = null)
    {

        if(isset($genre) && !is_null($genre) && !empty($genre)){

            $genreInfo = Genre::where('name','=', $genre)->first();
            
            $searchCondition = array();
            
            if ($genreInfo){
                if($genre == 'Action' || $genre == 'action'){
                    array_push($searchCondition, "Action","Adventure"); 
                }elseif ($genre == 'Animation' || $genre == 'animation'){
                    array_push($searchCondition, "Animation","Family"); 
                }elseif($genre == 'Comedy' || $genre == 'comedy'){
                    array_push($searchCondition, "Comedy"); 
                }elseif ($genre == 'Terror' || $genre == 'terror'){
                    array_push($searchCondition, "Horror", "Thriller"); 
                }elseif($genre == 'Romance' || $genre == 'omance'){
                    array_push($searchCondition, "Romance"); 
                }elseif ($genre == 'Fiction' || $genre == 'fiction'){
                    array_push($searchCondition, "Sci-fi", "Fantasy");
                }elseif ($genre == 'Drama' || $genre == 'drama'){
                    array_push($searchCondition, "Drama", "Mystery");
                }elseif ($genre == 'War' || $genre == 'war'){
                    array_push($searchCondition, "War", "Crime");
                }
            }


            $films = Film::select('films.*')
            ->join('genres', 'films.genre_id', '=', 'genres.id')
            ->whereIn('genres.name', $searchCondition)
            ->orderBy('films.name', 'asc')
            ->get();

            /*
            if(count($films) > 0){
                foreach($films as $film){
                    echo '<b>'.$film->genre->name.'</b>: '.$film->name .'<br>';
                }
            }else{
                echo "No hay ningun resultado".'<br>';
            }
            */

            
            return redirect()->back()->with(['films' => $films]);

            
            
        }
        
    }
    
}
