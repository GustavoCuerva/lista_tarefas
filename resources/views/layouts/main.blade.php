<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/style.css">

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    </head>
    <body>

        <header>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form action="" method="post">
                        <input type="search" class="form-control" name="search" id="search" placeholder="Pesquisar tarefa">
                    </form>
                    <ul class="d-flex menu">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li href="" class="nav-item"><a href="/tasks/create" class="nav-link">Cadastrar tarefa</a></li>
                        <li class="nav-item"><a href="/" class="nav-link">Sair</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>

            <!-- Checking if there is a message in the session, if there is, it will display it. -->
            @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
            @endif

            @yield('content')
        </main>

        <footer>
            <p>Gustavo Cuerva &copy; 2022</p>
        </footer>
        <script src="/js/script.js"></script>
    </body>
</html>
