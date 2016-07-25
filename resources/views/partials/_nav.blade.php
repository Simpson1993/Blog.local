<!-- Default Bootstrap Navbar-->
<nav class="navbar navbar-default">

    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="/">Laravel Blog</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li class="{{ Request::is('home') ? "active" : "" }}"><a href="/">Home</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
                <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
                {{--<li class="{{ Request::is('message') ? "active" : "" }}"><a href="/api">Message</a></li>--}}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Hello, {{ Auth::user()->name }}! <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {{--<li>{{ Html::linkRoute('posts.index', ' Posts', [], ['class' =>'glyphicon glyphicon-list-alt']) }}</li>--}}
                            {{--<li>{{ Html::linkRoute('categories.index', ' Categories', [], ['class' =>'glyphicon glyphicon-pushpin']) }}</li>--}}
                            {{--<li>{{ Html::linkRoute('tags.index', ' Tags',[], ['class' =>'glyphicon glyphicon-tags']) }}</li>--}}
                            {{--<li>{{ Html::linkRoute('profile', ' My Profile', [Auth::user()->id], ['class' =>'glyphicon glyphicon-user']) }}</li>--}}
                            {{--<li>{{ Html::linkRoute('settings', ' Settings', [], ['class' =>'glyphicon glyphicon-cog']) }}</li>--}}
                            <li><a href="{{ url('user/profile/Auth::user()->id')}}"><i class="fa fa-user men-style"></i> My Profile</a></li>
                            <li><a href="{{ route('posts.index') }}"><i class="fa fa-newspaper-o men-style"></i> Posts</a></li>
                            <li><a href="{{ route('categories.index')}}"><i class="fa fa-paperclip men-style"></i> Categories</a></li>
                            <li><a href="{{ route('tags.index')}}"><i class="fa fa-tags men-style"></i> Tags</a></li>
                            <li><a href="{{ route('settings')}}"><i class="fa fa-spin fa-cog men-style"></i> Settings</a></li>

                            @if (Auth::user()->id == 99)
                                <li>{{ Html::linkRoute('settings', ' Admin room', [], ['class' =>'glyphicon glyphicon-briefcase']) }}</li>
                            @endif
                            <li role="separator" class="divider"></li>
                            {{--<li>{{ Html::linkRoute('logout', ' Logout', [], ['class' =>'glyphicon glyphicon-log-out']) }}</li>--}}
                            <li><a href="{{ route('logout')}}"><i class="fa
                            fa-sign-out men-style"></i> Logout</a></li>
                        </ul>
                    </li>
                @else
                    {{--<li>{{ Html::linkRoute('login', ' Login', [], ['class' =>'btn btn-default glyphicon glyphicon-log-in']) }}</li>--}}
                    <li><a href="{{ route('login')}}" class="btn btn-block btn-default"><i class="fa fa-sign-in men-style"></i> Login</a></li>
                @endif
            </ul>

        </div>

    </div>
</nav>
