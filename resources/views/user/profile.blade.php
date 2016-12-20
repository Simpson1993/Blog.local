@extends('main')

@section('title', '| Profile')

@section('content')

    <div class="panel"
         @if($user->profile_banner_url != "")
         style="background-image: url('{{ $user->profile_banner_url}}');padding-bottom: 100px; text-align: center;"
            @endif>
        @if($user->profile_image_url != "")
            <img src="{{ $user->profile_image_url }}"
                 class="img-thumbnail img-responsive center-block form-spacing-top"
                 width="200">
        @else
            <img src="https://vstroike.pro/assets/images/user-default.png"
                 class="img-thumbnail img-responsive center-block" width="200">
        @endif
        <h1 class="user-name">{{ $user->name }}</h1>
        <div class="row">
            <div class="col-md-6">
                <p class="user-info">Age: {{ $user->age }}</p>
                <p class="user-info">About: {{ $user->about_me }}</p>
                <p class="user-info">Contacts: {{ $user->contacts }}</p>
                <ul class="user-info">Added posts:
                    @foreach($posts as $post)
                        <li class="user-info"><a
                                    href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <p class="user-info">Quantity of added
                    comments: {{ $comments }}</p>
            </div>
        </div>
    </div>

@endsection
