@extends('main')

@section('title', "| $post->title")

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p class="font-for-body">{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
            <b>Author: {{ $post->user->name }}</b>
            <hr>
            <h3 class="for-comment">Comments</h3>

            @if ($users != null)
                {!! Form::open(['route' => 'comments.store', 'data-parsley-validate' => '']) !!}

                {{ Form::hidden('user_id', $users) }}

                {{ Form::label('body', 'Comment: ') }}
                {{ Form::text('body', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::hidden('post_id', $post->id) }}

                {{ Form::submit('Add New Comment', ['class' => 'btn btn-button btn-primary btn-top-space']) }}

                {!! Form::close() !!}
            @endif

            @foreach($comments as $comment)
                @if ($post->id == $comment->post_id)
                    <div class="media">
                        <div class="media-left">
                            @if($comment->user->profile_image_url != "")
                                <img class="media-object"
                                     src="{{ $comment->user->profile_image_url }}"
                                     width="80">
                            @else
                                <img class="media-object"
                                     src="https://vstroike.pro/assets/images/user-default.png"
                                     width="80">
                            @endif
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->user->name }}</h4>
                            <p>{{ $comment->body }}</p>
                        </div>
                        <p class="btn-position">
                            <i>{{ date('M j, Y H:i', strtotime($comment->created_at)) }}</i>
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection