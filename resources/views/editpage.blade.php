<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Página</title>
    <link rel="stylesheet" href="{{url('assets/css/page.css')}}">
</head>
<body>
    <div class="main">
        <h3>{{ isset($page) ? 'Editar Página' : 'Nova Página' }}</h3>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li> 
                @endforeach
            </ul>
        @endif

        <form method="post" enctype="multipart/form-data">
            @csrf 

            <label for="">
                Titulo: <br>
                <input type="text" name="op_title" value="{{$page->op_title ?? ''}}">
            </label>

            <label for="">
                Descrição: <br>
                <textarea name="op_description" id="" cols="80" rows="10">
                    {{$page->op_description ?? ''}}</textarea>
            </label>

            <label for="">
                Foto: <br>
                <input type="file" name="op_profile_image">
            </label>

            <label for="">
                Bg: <br>
                <select name="op_bg_type" id="">
                    <option value="image">Imagem</option>
                    <option value="color">Cor</option>
                </select>
            </label>

            <label for="">
                Cor do texto: <br>
                <input type="color" name="op_text_color" value="{{$page->op_text_color ?? '#000000'}}">
            </label>

            <label for="">
                Cor de Fundo: <br>
                <input type="color" name="op_bg_value" value="{{$page->op_bg_value ?? '#ffffff'}}">
            </label>

            <label for="">
                <input type="submit" value="Salvar">
            </label>
        </form>
    </div>
</body>
</html>