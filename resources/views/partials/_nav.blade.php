<!-- Default Bootstrap Navbar-->
<nav class="navbar navbar-default">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/public">Home</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/public/blog">Blog</a></li>
                <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/public/about">About</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/public/contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Hello, {{ Auth::user()->name }}! <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('posts.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Posts</a></li>
                            <li><a href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-pushpin"></i> Categories</a></li>
                            <li><a href="{{ url('user/profile/'.Auth::user()->id) }}"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                            <li><a href={{ url('user/settings') }} ><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }} "><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                        </ul>
                    </li>
                @else

                    <a href="{{ route('login') }}" class="btn btn-default btn-top-space glyphicon glyphicon-log-in"> Login</a>

                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
