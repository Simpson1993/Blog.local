@extends('main')

@section('title', '| Profile')

@section('content')

    <div class="panel"
         @if($user->profile_banner_url != "")
         style="background-image: url('{{ $user->profile_banner_url}}');padding-bottom: 200px; text-align: center;"
         @endif>
         @if($user->profile_image_url != "")
            <img src="{{ $user->profile_image_url }}" class="img-thumbnail img-responsive center-block" width="200">
         @else
            <img src="https://vstroike.pro/assets/images/user-default.png" class="img-thumbnail img-responsive center-block" width="200">
         @endif
         <h1 class="user-name">{{ $user->name }}</h1>
    </div>

@endsection
