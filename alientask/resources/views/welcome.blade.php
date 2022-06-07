@extends('layouts.app')

@section('title', 'Alien Task')

@section('content')

    <section class="container" id="top">
        <a href="/">
            <ion-icon name="planet-outline" id="logo"></ion-icon>
        </a>
    </section>

    <section class="container" id="middle">
        <h1>Alien Task</h1>
        <h2 style="color: rgba(148, 0, 211, .8)">Organize seu dia dia de maneira simplificada.</h2>
    </section>

    <section class="container bg-purple-clip text-left" style="padding: 1.5rem">
        <ul>
            <li><span>Já é de casa? Pode entrar!</span></li>
            <li><a href="{{route('login')}}" id="login" class="link"><ion-icon name="rocket-outline"></ion-icon> Entrar</a></li>
            <li><span>Novo por aqui? Registre-se!</span></li>
            <li><a href="{{route('register')}}" id="register" class="link"><ion-icon name="person-add-outline"></ion-icon> Resgistrar-se</a></li>
        </ul>
    </section>

@endsection
