@extends('layouts.app')

@section('title', 'Entrar')

@section('style', 'auth')

@section('content')
    <section class="container" id="top">
        <a href="/">
            <ion-icon name="planet-outline" id="logo"></ion-icon>
        </a>
    </section>

    <section class="container bg-purple-clip">
        <h2 style="padding: 1rem">Entrar</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text" style="color: #FFF">
                    É bom não compartilhá-lo por aí.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha:</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>

              <button type="submit" id="submit">Entrar</button>
        </form>
    </section>

    <section class="container bg-purple">
        &nbsp; {{--Código para renderizar espaço vazio--}}
    </section>

@endsection
