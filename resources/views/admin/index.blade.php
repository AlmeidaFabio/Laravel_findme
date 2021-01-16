@extends('admin.template')

@section('title', 'Find.me - Home')

@section('nav')
    <div class="nav-top">
        <a href="{{url('/admin')}}">
            <img src="{{url('assets/images/pages.png')}}" width="28" alt="pages">
        </a>

        <a href="{{url('/admin/'.$user->id)}}">
            <img src="{{url('assets/images/add-file.png')}}" width="28" alt="pages">
        </a>
    </div>

    <div class="nav-bottom">
        <a href="{{url('/admin/logout')}}">
            <img src="{{url('assets/images/logout.png')}}" width="28" alt="logout">
        </a>
    </div>
@endsection

@section('content')
    <header>
        <h2>Suas páginas {{$user->name}}</h2>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{$page->op_title}} ({{$page->slug}})</td>
                    <td>
                        <a href="{{url('/'.$page->slug)}}" target="_blank">Abrir</a>
                        <a href="{{url('/admin/'.$page->slug.'/links')}}">Links</a>
                        <a href="{{url('/admin/'.$page->slug.'/editpage')}}">Editar</a>
                        <a href="{{url('/admin/'.$page->slug.'/deletepage')}}">Excluir</a>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection