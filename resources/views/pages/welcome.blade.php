@extends('main')

@section('title','| Homepage')

@section ('content')
        <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron jmb-image">
                        <h1>Welcome to My Blog!</h1>
                        <p class="lead">Thank you so much for visiting. This is my test website built with Laravel.
                            Please read my popular post!</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                    </div>
            <div class="col-md-8">

                @foreach($posts as $post)

                    <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                    <hr>
                @endforeach

            </div>
            <div class="col-md-3 col-md-offset-1">
                    <h2>Categories</h2>

                        @foreach($categories as $category)
                        <h4>{{ $category->name }}</h4>
                                @foreach($posts as $post)
                                    @if ($post->category_id == $category->id)
                                    <a href="{{ url('blog/'.$post->slug) }}">{{ ($post->title) }}</a>
                                    <br>
                                    @endif
                                @endforeach
                        @endforeach

            </div>
            <div class="col-md-3 col-md-offset-1">
                    <hr>
                    <h2>Last comments</h2>
                    @foreach($comments as $comment)
                        <h4>{{ $comment->user->name }}</h4>
                        <p>{{ $comment->body }}</p>

                    @endforeach


            </div>
        </div>
@endsection

