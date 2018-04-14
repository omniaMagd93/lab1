<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
        'title' => 'required|unique:posts|min:6|max:20',
        'description' => 'required',
        'user_id' => 'required',
    ],[
          'title.required' => "Title is required",
          'title.unique' => "title must be unique",
          'title.min' => "please insert 6 characters at least",
          'description.required' => "Description is required",


    ]);

       Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }
     public function edit(Request $request)
    {
       //dd($id);
        //DB::table('posts')->whereId($id)->first();
        $post = Post::whereId($request->id)->first();

        $users = User::all();

        return view('posts.edit',[
            'post' => $post,
            'users' => $users
        ]);
    }

     public function update(Request $request)
    {
       //dd($request->title);  

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
