<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alien Task - Gerenciador de tarefas</title>
    <x-icon></x-icon>
     <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>
<body>
    <div class="container-fluid">
        @if (@session('msg'))
        <div class="container" id="msg">
            <span class="msg">{{session('msg')}}</span>
            <ion-icon name="close-circle-outline" class="shadow" id="close"></ion-icon>
        </div>
        @endif
        <div class="container">
            
            <a href="/">
                <img src="/img/icons/alien-head.png" class="img-fluid" id="logo" alt="Responsive image">
            </a>
            <h1 class="texto">Alien Task</h1>
        </div>

        <div class="container">
            <h2>Seja produtivo com um gerenciador de tarefas</h2>
        </div>

        {{-- IF BIGGER THAN 400px --}}
        <div class="container-fluid text-center" id="carousel">
            <div class="row">

                <div class="col">
                    <a id="prev">
                        <span><ion-icon name="chevron-back-outline"></ion-icon></span>
                    </a>
                </div>

                <div class="col">
                    <img class="img-fluid" src="/img/icons/taken-animate.svg" alt="Saia do mundo da procrastinação" id="carouselimage">
                    <h5 id="slidetitle">Saia do mundo da procrastinação</h5>
                    <p id="slidephrase">É hora de organizar sua vida</p>
                </div>

                <div class="col">
                    <a id="next">
                        <span><ion-icon name="chevron-forward-outline"></ion-icon></span>
                    </a>
                </div>
            </div>
        </div>

         {{-- IF SMALLER THAN 400px --}}
         <div id="slider">
            <div class="col text-center">
                <img src="/img/icons/taken-animate.svg" alt="Saia do mundo da procrastinação">
                <h5>Saia do mundo da procrastinação</h5>
                <p>É hora de organizar sua vida</p>
            </div>
            <div class="col text-center">
                <img src="/img/icons/calendar-animate.svg" alt="Cumpra prazos com folga">
                <h5>Cumpra seus prazos com folga</h5>
                <p>Aumente sua produtividade</p>
            </div>
            <div class="col text-center">
                <img src="/img/icons/alien-scientist-animate.svg" alt="Compartilhe com os amigos">
                <h5>Salve seus amigos da procrastinação</h5>
                <p>Compartilhe o Alien task com eles</p>
            </div>
        </div>

        <div class="row justify-content-center text-center" id="buttons">
            <div class="col row">
                @if (Route::has('login'))
                    <div class="col-12 rounded">
                        <a href="{{ route('login') }}">
                            <button class="btn btn-secondary color border border-collapse text-decoration-none text-white" id="entrar">
                                Entrar
                            </button>
                        </a>
                    </div>
                    @if (Route::has('register'))
                        <div class="col-12">
                            <a href="{{ route('register') }}">
                                <button class="btn border-collapse text-decoration-none text-dark" id="registrar">
                                    Criar Conta
                                </button>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        
    </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script src="/js/interfaces.js"></script>
    <link rel="stylesheet" href="/css/welcome.css">
</body>

</html>