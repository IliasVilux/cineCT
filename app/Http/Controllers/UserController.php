<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('profile.profile');
    }

    public function userFavoriteList()
    {
        $userIdList = Auth::User()->id;
        $userFavs = FavouriteLists::where('user_id', $userIdList)->get();

        return view('list', compact(['userFavs']));
    }

    public function specificFavoriteList($id){
        $userIdList = Auth::User()->id;
        $lista = FavoriteList::where('user_id', $userIdList)->where('list_id', $id)->get();
        $data['list'] = FavouriteLists::find($id);
        $data['animes'] = array();
        $data['series'] = array();
        $data['films'] = array();
        
        foreach($lista as $content){
            if($content->anime_id != null){
                $anime = Anime::find($content->anime_id);
                array_push($data['animes'], $anime);
            }
            if($content->serie_id != null){
                $serie = Serie::find($content->serie_id);
                array_push($data['series'], $serie);
            }
            if($content->film_id != null){
                $film = Film::find($content->film_id);
                array_push($data['films'], $film);
            }
        }
        
        return view('/list/list', compact(['userFavs', 'arrayAnimes', 'arraySeries', 'arrayFilms']));
    }

    public function searchContent(Request $request)
    {

        $search = $request->input('search');

        $request->validate([
            'search' => 'string|max:255|required',
        ]);

        $content = array(
            'films' => array(),
            'series' => array(),
            'animes' => array(),
        );

        $films = Film::where('name', 'LIKE', '%' . $search . '%')->get();
        $series = Serie::where('name', 'LIKE', '%' . $search . '%')->get();
        $animes = Anime::where('name', 'LIKE', '%' . $search . '%')->get();

        if (!is_null($search) || !empty($search) || $search != '') {

            if (count($films) != 0 && !empty($films)) {
                foreach ($films as $film) {
                    array_push($content['films'], $film);
                }
            }

            if (count($series) != 0 && !empty($series)) {
                foreach ($series as $serie) {
                    array_push($content['series'], $serie);
                }
            }

            if (count($animes) != 0 && !empty($animes)) {
                foreach ($animes as $anime) {
                    array_push($content['animes'], $anime);
                }
            }
        }

        /*
        $keys = array_keys($content);
        for ($i = 0; $i < count($content); $i++) {
            echo $keys[$i] . "{<br>";
            foreach ($content[$keys[$i]] as $key => $value) {
                //echo $key . " : " . $value . "<br>";
                echo $value->{'poster_path'};
            }
            echo "}<br>";
        }
        */ 

        //var_dump(empty($content['anime']));

        return view('/search/search', ['content' => $content, 'search' => $search]);
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $request->validate([
            'username' =>'required|min:4|string|max:255|unique:users,nick,'.$userId,
            'language' => 'required',
        ]);
        $user = Auth::user();
        $user->nick = $request['username'];
        $user->lang = $request['language'];

        
        $user->save();
        
        $this->changeLanguages($request['language']);

        return view('profile.profile')->with('message','Profile Updated');
    }
    public function deleteAccount(){

        $user = Auth::user();
        $id = $user->id;
            
        $isset_reviews = Review::where('user_id', $id)->first();
        $isset_likes = Like::where('user_id', $id)->first();
        
        if($isset_likes) {
            $likes = Like::where('user_id', $id)->get();
            foreach($likes as $like) {
                $like->where('user_id', $user->id)->delete();
            }
        }
        
        if($isset_reviews) {
            $reviews = Review::where('user_id', $id);
            foreach($reviews as $review) {
                $review->where('user_id', $id)->delete();
            }
        }


        $userToDelete = User::findOrFail($id);
        $userToDelete->delete();

        Auth::logout();
        return redirect()->to('register')->with('signOut', 'Cuenta eliminada!');
    }

    public function activity(){

        $user = Auth::user();


        $likes = Like::select('likes.*')
        ->join('reviews', 'reviews.id', '=', 'likes.review_id')
        ->where('likes.user_id' ,'!=', $user->id)
        ->where('reviews.user_id', '=', $user->id)
        ->orderBy('likes.created_at', 'desc')
        ->paginate(10);  

        return view('activity.activity', ['likes' => $likes]);
    }
    
    public function changeLanguages($lang)
    {
        App::setLocale($lang);
        session()->put('locale', $lang);
    }

    public function getUserProfileImg()
    {
        $images = Image::get();
        return view ('profile.profileImg', ['images' => $images]);
    }

    public function postUserProfileImg($id = null)
    {
        if(isset($id) && !is_null($id) && !empty($id)){
            
            $authUser = Auth::user();

            $user = User::find($authUser->id);
            $user->image_id = $id;
            $user->save();

            return redirect()->to(route('user.profile'))->with('profileImageUpdated', trans('profile.img_updated'));
            
        }else{
            return view('profile.profile');
        }
    }



}
