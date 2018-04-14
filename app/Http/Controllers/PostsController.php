<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Post;

use App\User;

use App\Http\Requests\PostsStoreRequest;

use App\Http\Requests\PostsUpdateRequest;



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

    public function store(PostsStoreRequest $request)
    {

       Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }
     public function edit(request $request)
    {
       
        $post = Post::whereId($request->id)->first();

        $users = User::all();

        return view('posts.edit',[
            'post' => $post,
            'users' => $users
        ]);
    }

     public function update(PostsUpdateForm $request)
    {
         

   Post::where('id', $request->id)->update(array(
            'title'    =>  $request->title,
            'description' =>  $request->description,
            'user_id'  => $request->user_id,
            
        ));
   return redirect(route('posts.index')); 
    }

      public function show(Request $request)
    {
       //dd($id);
        //DB::table('posts')->whereId($id)->first();
        $post = Post::whereId($request->id)->first();

        $users = User::all();

        return view('posts.show',[
            'post' => $post,
            'users' => $users
        ]);
    }
}
