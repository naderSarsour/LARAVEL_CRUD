<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {
      $user= User::find(1);
    //   dd($user->name);
     // dd($user);
     dd($user->insurance);
        // return 'DD'; 
    }
    
    public function one_to_many()
    {
     // $category= Category::findOrFail(1);
     // dd($category->posts);
     // dd($user);
     //dd($user->insurance);
         //return 'DD'; 
         $post= Post::find(1);
         dd($post->category);
    }
}