<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Panel de Administracion @yield('title') </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/12a84aec64.js" crossorigin="anonymous"></script>
    <link href="<?= url('css/app.css') ?>" rel="stylesheet">
</head>



<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg text-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <h1>Yo Life</h1>
                </a>
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.products') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.news') }}">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.users') }}">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white"
                                href="{{ route('admin.productStatistics') }}">Estadisticas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('home') }}">Sitio</a>
                        </li>
                        </li>
                        <a class="nav-link text-white" href="{{ route('profile.show') }}">Mi perfil</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <form action="{{ route('auth.processLogout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn nav-link text-white nav-link-text">{{ auth()->user()->email }}(Cerrar Sesión)</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('auth.formLogin') }}">Iniciar Sesión</a>
                        </li>
                    @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container py-3">
            @if (Session::has('feedback.message'))
                <div class="alert alert-{{ Session::get('feedback.type', 'success') }}">{!! Session::get('feedback.message') !!}</div>
            @endif

            @yield('main')

        </main>
        <footer class="footer">
            <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
