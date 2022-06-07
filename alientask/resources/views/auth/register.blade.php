@extends('layouts.app')

@section('title', 'Registrar-se')

@section('style', 'auth')

@section('content')

<section class="container" id="top">
    <a href="/">
        <ion-icon name="planet-outline" id="logo"></ion-icon>
    </a>
</section>

<section class="container bg-purple-clip">
    <h2 style="padding: 1rem">Registrar-se</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Senha:</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        <small id="emailHelp" class="form-text" style="color: #FFF">
            Não insira senhas fáceis como: "1234"...</small>
      </div>

      <button type="submit" id="submit">Registrar-se</button>
    </form>
</section>

<section class="container bg-purple">
    &nbsp; {{--Código para renderizar espaço vazio--}}
</section>
@endsection
