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
    {   //表单提交三步走  验证 逻辑 渲染
        $this->validate(request(),[
            'title'=>'required|string|max:64|min:5',
            'content' => 'required|string',
        ]);


        $user_id = \Auth::id();
        $params = array_merge(request(['title','content']),compact('user_id'));

        Post::create($params);
        return redirect("/posts");
    }
    //edit post
    public function edit(Post $post)
    {


        return view("post/edit",compact('post'));
    }
    //update post
    public function update(Post $post)
    {
        $this->validate(request(),[
            'title'=>'required|string|max:64|min:5',
            'content' => 'required|string',
        ]);

        $this->authorize('update',$post);  //验证授权


        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        return redirect("/posts/{$post->id}");
    }
    //delete post
    public function delete(Post $post)
    {
        $this->authorize('delete',$post);


        $post->delete();
        return redirect('/posts');
    }
    //upload image;
    public function imageUpload(Request $request)
    {
        $path=$request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
    }
}
