<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache; 

class LikeController extends Controller
{
    public function like(){
        
    }

    public function likesCount($model,$id){
        // dd($model,$id);
        // $work = Work::find($work->id);
        // $user = User::find(2);
        // dd($work);
        // dd($user);
        // dd($work->likers()->count());
        // dd($work->likes());
        // return $work->likers()->count();

        if($model == 'work'){
            return Cache::remember('work.like-' . $id, 60 * 60 * 24, function() use($id){ 
                $work = Work::find($id);
                return $work->likers()->count();
            }); 
        }
    }

    public function liked(){

        $work = Work::find($work->id);
        $user = User::find(1);
        // dd($work);
        // dd($user);
        // dd($work->likers()->count());
        // dd($work->likes());
        return $user->hasLiked($work); ;
    }

    public function toggle($model,$id){

        if($model == 'work'){
            $user = Auth::user();
            $work = Work::find($id);
            $user->toggleLike($work);

            return $work->likers()->count();
        }
    }

}
