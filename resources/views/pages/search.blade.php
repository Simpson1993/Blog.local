@extends('main')

@section('title', '| Search')

@section('content')

    @if (count($posts) === 0)
        ... no one posts found
    @elseif (count($posts) >= 1)

        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3>{{ ($post->title) }}</h3>
                    <p>{{ substr($post->body, 0, 150) }} {{ strlen($post->body) > 150 ? "..." : "" }}</p>
                    <p><a href="{{ url('blog/'.$post->slug) }}">read more...</a></p>
                </div>
            </div>
        @endforeach
    @endif

@endsection