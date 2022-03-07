<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact - @yield('title')</title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- JS -->

    <script src="{{ mix('js/app.js') }}"></script>

</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-blue border-bottom shadow-sm">

        <h5 class="my-0 mr-md-auto font-weight-normal">Asep Laravel - @yield('title')</h5>

        <nav class="my-2 my-md-0 mr-md-3">

            <a class="p-2 text-dark" href="{{ route('home.index') }}">Home</a>

            <a class="p-2 text-dark" href="{{ route('home.contact') }}">Contact</a>

            <a class="p-2 text-dark" href="{{ route('posts.index') }}">Show</a>

            @guest
                @if (Route::has('register'))
                    <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
                @endif
                <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
            @else
                <a class="p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                </form>
            @endguest

        </nav>

    </div>

    <div class="container">

        @if(session('status'))

            <div class="alert alert-success">

                {{ session('status') }}

            </div>

        @endif

        @yield('content')

    </div>

</body>

</html>