<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('assets/css/admin.login.css')}}">
</head>
<body>
    <div class="form-area">
        <h1>Login</h1>

        @if($error)
            <div class="error">{{$error}}</div>
        @endif

        <form method="POST">
            @csrf

            <input type="email" name="email" placeholder="Digite seu Email">
            <input type="password" name="password" placeholder="Digite sua senha">
            <input type="submit" value="Entrar">

            <p>Ainda não tem cadastro? <a href="{{url('admin/register')}}">Cadastre-se</a></p>
        </form>
    </div>
</body>
</html>