<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')
    </head>
    <body>
        <div class="blog-header">
            <div class="container">
                    @if (Auth::check())
                        <p>
                            Welcome, {{Auth()->user()->name}}
                        </p>
                        <a href="/logout" class="nav">
                            Logout
                        </a>
                    @endif
                    @if(!Auth::check())
                    <p>
                        Welcome, Guest
                    </p>
                    <a href="/login" class="nav">
                        Login
                    </a>
                    <a href="/register" class="nav">
                        Register
                    </a>
                    @endif
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('content')
                </div>
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('partials.sidebar')
                </div>
            </div>
        </div>
        @include('partials.footer')
    </body>
</html>