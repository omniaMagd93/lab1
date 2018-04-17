<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostsStoreRequest;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
    	$posts= Post::with('user')->paginate(2);

    	return PostResource::collection($posts);
    	
    }


    public function store(PostsStoreRequest $request)
    {
    	 $post = Post::create($request->all());

           return new PostResource($post);
    }
}
