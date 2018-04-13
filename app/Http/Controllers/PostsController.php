<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

use App\Post;

use App\User;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	return view('posts.index',[
    		'posts' => $posts
    	]);
    }

     public function create()
    {
        $users = User::all();
    	return view('posts.create',[
           'users' => $users
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
        'title' => 'bail|required|unique:posts',
        'description' => 'required',
        'user_id' => 'required',
    ]);

       Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }
}
