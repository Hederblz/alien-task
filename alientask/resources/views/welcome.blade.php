<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bem-Vindo!</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@600&family=League+Gothic&display=swap');

        .texto {
            font-family: Fira Sans;
        }

        .color {
            background: #b400ff;
        }
    </style>



</head>

<body>

    <div class="container w-75 mx-6">

        <img src="/img/icons/alien.png" class="img-fluid mt-5" alt="Responsive image">

        <div class="ml-2 mt-5 texto">
            <h3>Seja produtivo com um gerenciador de tarefas</h3>
        </div>

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col row">
                @if (Route::has('login'))
                    <div class="col-12 mb-2 rounded">
                        <a href="{{ route('login') }}">
                            <button
                                class="btn btn-primary w-100 color border border-collapse text-decoration-none text-white ">Entrar</button>
                        </a>
                    </div>
                    @if (Route::has('register'))
                        <div class="col-12">
                            <a href="{{ route('register') }}"><button
                                    class="btn w-100 border border-collapse text-decoration-none text-dark">Criar
                                    Conta</button></a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</body>
