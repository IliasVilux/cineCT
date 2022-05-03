<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public static function store(){
        
        $contador = 1;
        $apiLinks = array();
        $allFilms = array();

        do{
            //$filmApi = Http::get('https://api.themoviedb.org/3/movie/' . $contador . '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-US');
            $filmApi = Http::get('https://api.themoviedb.org/'.$contador.'/discover/movie?api_key=9d981b068284aca44fb7530bdd218c30&with_genres=27');
            array_push($apiLinks, $filmApi);
            $contador++;
        }while($contador < 10);
        
        foreach($apiLinks as $link) {
            $filmJson = json_decode($link);
            /*
            if (isset($filmJson->{'id'}) && isset($filmJson->{'genres'}[0]->{'name'})){
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

                if(isset($filmJson->{'genres'}[0]->{'name'}) && ($filmJson->{'genres'}[0]->{'name'} === 'Terror' || $filmJson->{'genres'}[0]->{'name'} === 'Thriller'))
                {
                    array_push($allFilms, $filmJson);
                }
            }
            */
            
            if(isset($filmJson->{'results'}))
            {
                array_push($allFilms, $filmJson);
            }
                        
        }

        
        if(count($allFilms) != 0)
        {
            foreach($allFilms as $filmContent)
            {
                
                //$contador = count($filmContent->{'genres'});
                //echo $filmContent->{'id'}. ' - ' .$filmContent->{'genres'}[0]->{'name'} . '<br>';
                $count = count($filmContent->{'results'});
                for ($i=0; $i < $count; $i++) { 
                    echo 'Nombre; '.$filmContent->{'results'}[$i]->{'title'} .'<br>' . 'Genre_id: '. $filmContent->{'results'}[$i]->{'genre_ids'}[0]. '<br>'. 'poster_path: https://image.tmdb.org/t/p/w500'. $filmContent->{'results'}[$i]->{'backdrop_path'}. '<br>description: '. $filmContent->{'results'}[$i]->{'overview'}. '<br> release_date: '. $filmContent->{'results'}[$i]->{'release_date'}. '<br><br>';
                }
                
            }
            
        }else{
            echo "No té contingut";
        }
        //die();
        

        return $allFilms;

    }

    public function returnFilms($id) {
        $film = Film::find($id);
        $comments = Review::where('film_id' ,'=', $id)->get();
        $shareComponent = $this->ShareWidget();

        
        echo '<b>Pelicula: '. $film->name. '</b><br><br>';
        
        
        $allComments = array(
            'comments' => array(),
            'likes' => array(),
        );
        if(count($comments) !== 0){

            foreach($comments as $comment){
    
                // ens retorna tots els likes que te la review
                $currentCommentTotalLikes = Like::where('review_id', $comment->id)->get();
                //$currentCommentTotalLikes = Like::withcount('review')->orderByDesc('review_count')->get();
                //dump($currentCommentTotalLikes);
                
                if($currentCommentTotalLikes !== 0)
                {
                    echo 'ID del comentario: '. $comment->id. '<br>';
                    echo 'Autor: '.$comment->user->nick .'<br>'; 
                    echo 'Comentario: '.$comment->description .'<br>'; 
                    echo 'Total Likes: <b>'.count($currentCommentTotalLikes).'</b><br>'; 
                    echo '<br>----------------------------------';
                    echo '<br><br>';
                }
                
                //array_push($allComments['comments'], $comment);
                //array_push($allComments['likes'], $currentCommentTotalLikes);
                
            }
        }else{
            echo 'Esta pelicula no tiene ningun comnetario/review';
        }

        die();
        
        if (!is_null($film)) {
            return view('detail.detailFilms', compact('film', 'comments', 'shareComponent'));
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
            ->paginate(25);

            //dd(count($films) > 0);

            return view('content.filterFilm',['films' => $films, 'genre' => $genre]);
            
            
        }
        
    }
    
}
