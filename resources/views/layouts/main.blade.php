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
                    <form action="{{route('tasks.list')}}" method="GET">
                        <input type="search" class="form-control" name="search" id="search" placeholder="Pesquisar tarefa">
                    </form>
                    <ul class="d-flex menu">
                        <li class="nav-item"><a href="{{route('index')}}" class="nav-link">Home</a></li>
                        <li href="" class="nav-item"><a href="{{route('tasks.list')}}" class="nav-link">Todas tarefas</a></li>
                        <li href="" class="nav-item"><a href="{{route('tasks.create')}}" class="nav-link">Cadastrar tarefa</a></li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                            </form>
                            
                        </li>
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
