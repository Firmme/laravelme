<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //list
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(6);


        return view("post/index",compact("posts"));
    }
    //post
    public function show(Post $post)
    {
        return view("post/show",compact('post'));
    }
    //new post
    public function create()
    {
        return view("post/create");

    }
    //
    public function store()
    {
        Post::create(request(['title','content']));
        return redirect("/posts");
    }
    //edit post
    public function edit()
    {
        return view("post/edit");
    }
    //update post
    public function update()
    {

    }
    //delete post
    public function delete()
    {

    }
}
