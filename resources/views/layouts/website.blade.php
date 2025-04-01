<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light col-md-6 offset-md-3">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        {{-- <img src="/img/logo-main.svg" alt="sighting"> --}}
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/uap-reportings" class="nav-link">Avistamentos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/uap-reporting/create" class="nav-link">Informar avistamento</a>
                        </li>
                        @auth                        
                        <li class="nav-item">
                            <a href="/admin/trainings/create" class="nav-link">Cadastrar avistamento</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();" class="nav-link">Logout</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar-se</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <section id="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            @yield('content')
            </div>
        </div>
        </section>
        <footer>
            <p>Meta Sighting &copy; 2025</p>
        </footer>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>