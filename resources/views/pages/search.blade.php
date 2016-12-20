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
                    <p><a href="{{ url('blog/'.$post->slug) }}">read more...</a>
                    </p>
                </div>
            </div>
        @endforeach
    @endif
    <nav id="menuSystem" class="navMenu isOpen">
        <div id="hotelLogo">
            <div class="navMenuIcon logoIcon"></div>
            <div id="arrowPointer"></div>
            <ul id="navMenuMain">
                <li class="navMenuItem navMenuItem001">
                    <div class="navMenuIcon">Item 1</div>
                    <a href="">Item 1</a></li>
                <li class="navMenuItem navMenuItem002">
                    <div class="navMenuIcon">Item 2</div>
                    <a href="">Item 2</a></li>
                <li class="navMenuItem navMenuItem003">
                    <div class="navMenuIcon">Item 3</div>
                    <a href="">Item 3</a></li>
                <li class="navMenuItem navMenuItem004">
                    <div class="navMenuIcon">Item 4</div>
                    <a href="">Item 4</a></li>
                <li class="navMenuItem navMenuItem005">
                    <div class="navMenuIcon">Item 5</div>
                    <a href="">Item 5</a></li>
                <li class="navMenuItem navMenuItem006">
                    <div class="navMenuIcon">Item 6</div>
                    <a href="">Item 6</a></li>
                <li class="navMenuItem navMenuItem007">
                    <div class="navMenuIcon">Item 7</div>
                    <a href="">Item 7</a></li>
                <li class="navMenuItem navMenuItem008">
                    <div class="navMenuIcon">Item 8</div>
                    <a href="">Item 8</a></li>
                <li class="navMenuItem navMenuItem009">
                    <div class="navMenuIcon">Item 9</div>
                    <a href="">Item 9</a></li>
                <li class="navMenuItem navMenuItem010">
                    <div class="navMenuIcon">Item 10</div>
                    <a href="">Item 10</a></li>
            </ul>
        </div>
    </nav>

@endsection