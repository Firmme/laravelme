    @extends("layout.main")
    @section("content")

        <div class="col-sm-8 blog-main">
            <div class="alert alert-success" role="alert">
                下面是搜索"{{$query}}"出现的文章，共{{$posts->total()}}条
            </div>

            @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}
                    by <a href="/user/5">{{$post->user->name}}</a></p>

                {!! str_limit($post->content,5000,"...[查看全文]") !!}<span></span>
                <p class="blog-post-meta">赞 {{$post->zans_count}}| 评论 {{$post->comments_count}}</p>
            </div>
            @endforeach
            {{$posts->links()}}
        </div><!-- /.blog-main -->
    @endsection
