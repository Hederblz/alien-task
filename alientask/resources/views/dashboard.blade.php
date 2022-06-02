<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="{{route('userdestroy',Auth::user()->id)}}" method="POST">
                @method('DELETE')                            
                @csrf
                <button type="submit">DELETAR</button>
            </form>

            <form action="{{route('userupdate', Auth::user()->id)}}" method="POST">
                @method('PUT')
                @csrf
                <input type="text" name="name" placeholder="name">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="telefone" placeholder="telefone">
                <input type="password" name="password" placeholder="password">
                <button type="submit">mudar</button>
            </form>
</body>
</html>