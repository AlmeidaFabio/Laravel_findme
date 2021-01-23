@extends('admin.template')

@section('nav')
    <div class="nav-top">
        <a href="{{url('/admin')}}">
            <img src="{{url('assets/images/pages.png')}}" width="28" alt="pages">Suas Páginas
        </a>

        <a href="{{url('/admin/'.$user->id)}}">
            <img src="{{url('assets/images/add-file.png')}}" width="28" alt="pages">Nova Página
        </a>
    </div>

    <div class="nav-bottom">
        <a href="{{url('/admin/logout')}}">
            <img src="{{url('assets/images/logout.png')}}" width="28" alt="logout">
        </a>
    </div>
@endsection

@section('content')

<div class="pre-header">
    Página: {{$page->op_title}}
</div>

<div class="area">
    <div class="leftside">
        <header>
            <ul>
                <li @if ($menu == 'links') class="active" @endif><a href="{{url('/admin/'.$page->slug.'/links')}}">Links</a></li>
                <li @if ($menu == 'design') class="active" @endif><a href="{{url('/admin/'.$page->slug.'/design')}}">Aparência</a></li>
                <li @if ($menu == 'stats') class="active" @endif><a href="{{url('/admin/'.$page->slug.'/stats')}}">Estatísticas</a></li>
            </ul>
        </header>

        <h3>{{ isset($link) ? 'Editar Link' : 'Novo Link' }}</h3>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{$error}}</li> 
            @endforeach
        </ul>
    @endif

    <form method="post">
        @csrf 

        <label for="">
            Status: <br>
            <select name="status" id="">
                <option {{isset($link) ? ($link->status == '1' ? 'selected' : '') : ''}} value="1">Ativo</option>
                <option {{isset($link) ? ($link->status == '0' ? 'selected' : '') : ''}} value="2">Desativado</option>
            </select>
        </label>

        <label for="">
            Titulo: <br>
            <input type="text" name="title" value="{{$link->title ?? ''}}">
        </label>

        <label for="">
            URL: <br>
            <input type="text" name="href" value="{{$link->href ?? ''}}">
        </label>

        <label for="">
            Cor de fundo: <br>
            <input type="color" name="op_bg_color" value="{{$link->op_bg_color ?? '#ffffff'}}">
        </label>

        <label for="">
            Cor do texto: <br>
            <input type="color" name="op_text_color" value="{{$link->op_text_color ?? '#000000'}}">
        </label>

        <label for="">
            Borda: <br>
            <select name="op_border_type" id="">
                <option {{isset($link) ? ($link->op_border_type == 'square' ? 'selected' : '') : ''}} value="square">Quadrado</option>
                <option {{isset($link) ? ($link->op_border_type == 'rounded' ? 'selected' : '') : ''}} value="rounded">Arredondado</option>
            </select>
        </label>

        <label for="">
            <input type="submit" value="Salvar">
        </label>
    </form>
    </div>
    <div class="rightside">
        <iframe src="{{url('/'.$page->slug)}}" frameborder="0"></iframe>
    </div>
</div>   

@endsection