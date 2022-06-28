<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alien Task - Torne seus dias mais produtivos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .texto {
            font-family: 'Nunito';
        }

        .color {
            background: #b400ff;
        }
        h1{
            margin-top: -40px;
            margin-left: 45px;
        }

        img
        {
            width: 3rem;
        }

        .btn
        {
            padding: .5rem
        }
    </style>



</head>

<body>

    <div class="container w-75 mx-6">
                    @if (@session('msg'))
                    <div class="container" id="msg">
                        <span class="msg">{{session('msg')}}</span>
                        <ion-icon name="close-circle-outline" class="shadow" id="close"></ion-icon>
                    </div>
                    @endif
        <div>
            <a href="/">
                <img src="/img/icons/alien.png" class="img-fluid mt-5" alt="Responsive image">
            </a>
            <h1 class="texto">Alien Task</h1>
        </div>

        <div class="ml-2 mt-5 texto">
            <h3>Seja produtivo com um gerenciador de tarefas</h3>
        </div>

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col row">
                @if (Route::has('login'))
                    <div class="col-12 mb-2 rounded">
                        <a href="{{ route('login') }}">
                            <button
                                class="btn btn-secondary w-100 color border border-collapse text-decoration-none text-white ">Entrar</button>
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
        <footer class="bg-light text-center text-lg-start fixed">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Alien Task</h5>
                        <p>
                            O <b>Alien Task</b> é uma aplicação desenvolvida por estudantes do
                            curso de informática para internet no <b>IFPE</b> campus Igarassu;
                            cujo objetivo é ajudar pessoas que queiram tornar seu dia dia mais
                            organizado e produtivo.
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Desenvolvimento</h5>
                        <p>
                           O projeto foi desenvolvido na disciplina de projeto e prática II
                           com a utilização de modelos ágeis de gerênciamento de projeto.
                           Marcado por diversas spikes e entregas, esse projeto visa mostrar
                           o esforço coletivo de criação no framework <a href="https://laravel.com/">Laravel</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                &copy; 2022:
                <a class="text-dark" href="https://mdbootstrap.com/">alientask.com</a>
              </div>
        </footer>
    </div>
</body>
