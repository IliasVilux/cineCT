<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Review;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SerieController extends Controller
{
    public static function store(){
        
        $contador = 1;
        $apiLinks = array();
        $allSeries = array();

        do{
            $serieApi = Http::get('https://api.themoviedb.org/3/tv/' .$contador. '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
            array_push($apiLinks, $serieApi);
            $contador++;
        }while($contador < 20);
        
        foreach($apiLinks as $link) {
            $serieJson = json_decode($link);
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
                array_push($allSeries, $serieJson);
            }
        }

        return $allSeries;

    }

    public function returnSeries($id) {
        $serie = Serie::find($id);
        $profile = Image::all();
        $comments = Review::where('serie_id' ,'=', $id)->get();
        $shareComponent = $this->ShareWidget();

        if (!is_null($serie)) {
            return view('/detail/detailSeries', compact('serie', 'comments', 'profile', 'shareComponent'));
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
    public function addNewList($idSerie, Request $request)
    {
        $user = Auth::user()->id;
        $newListName = $request->input('newListName');
        $listUser = FavouriteLists::where('name', $newListName)->where('user_id', $user)->get('id')->max();

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
            $this->addFavourite($idSerie, $idList);
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
}