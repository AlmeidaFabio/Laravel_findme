<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{url('assets/css/admin.login.css')}}">
</head>
<body>
    <div class="form-area">
        <h1>Cadastro</h1>

        @if($error)
            <div class="error">{{$error}}</div>
        @endif

        <form method="POST">
            @csrf
            <input type="text" name="name" placeholder="Digite seu Nome">
            <input type="email" name="email" placeholder="Digite seu Email">
            <input type="password" name="password" placeholder="Digite sua senha">
            <input type="submit" value="Cadastrar">

            <p>Já tem cadastro? <a href="{{url('admin/login')}}">Faça login</a></p>
        </form>
    </div>
</body>
</html>