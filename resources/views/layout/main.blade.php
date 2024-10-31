<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-5" aria-label="Offcanvas navbar large">
            <div class="container-fluid px-lg-5">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo-nav.png" alt="LOGO PROJETO" width="50px">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header d-table menu-phone">
                        <div class="d-flex">
                            <img src="/img/users/{{auth()->user()->icone ?? 'default.jpg'}}" class="offcanvas-title rounded-circle" width="25px" id="offcanvasNavbar2Label">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>


                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-5 border-top">
                            @auth
                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="/"><i class="bi-house-fill"></i> Home</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="{{route('tarefas.create')}}"><i class="bi-bookmark-plus-fill"></i> Nova Tarefa</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="#"><i class="bi-person-fill"></i> Meu Perfil</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="{{route('equipes')}}"><i class="bi-people-fill"></i> Equipes</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="{{route('equipes.create')}}"><i class="bi-person-plus-fill"></i> Criar Equipe</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="#"><i class="bi-door-open-fill"></i> Sair</a>
                                </li>
                            @endauth

                            @guest
                                <li class="nav-item mt-3">
                                    <a class="btn btn-light" href="/login"><i class="bi-person-fill"></i> Login</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="{{route('users.create')}}"><i class="bi-person-plus-fill"></i> Cadastre-se</a>
                                </li>
                            @endguest
                        </ul>
                    </div>

                    <div class="offcanvas-body menu-none">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="/"><i class="bi-house-fill"></i> Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('tarefas.create')}}"><i class="bi-bookmark-plus-fill"></i> Nova Tarefa</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="/img/users/{{auth()->user()->icone ?? 'default.jpg'}}" alt="icone" class="rounded-circle" width="25px">
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi-person-fill"></i> Meu Perfil</a></li>
                                        <li><a class="dropdown-item" href="{{route('equipes')}}"><i class="bi-people-fill"></i> Equipes</a></li>
                                        <li><a class="dropdown-item" href="{{route('equipes.create')}}"><i class="bi-person-plus-fill"></i> Criar Equipe</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); this.closest('form').submit();"><i class="bi-door-open-fill"></i> Sair</a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth

                            @guest
                                <li class="nav-item mt-3">
                                    <a class="btn btn-light" href="/login"><i class="bi-person-fill"></i> Login</a>
                                </li>

                                <li class="nav-item mt-3">
                                    <a class="nav-link" href="{{route('users.create')}}"><i class="bi-person-plus-fill"></i> Cadastre-se</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="container">
        @include('components.alert-errors')
        @include('components.alert-success')
        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>