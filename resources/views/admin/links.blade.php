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
    <a href="{{url('admin/'.$page->slug.'/newlink')}}" class="bigbutton">Novo link</a>

    <ul id="links">
        @foreach ($links as $link)
            <li data-id="{{$link->id}}" class="link-item">
                <div class="link-item-order">
                    <img src="{{url('/assets/images/sort.png')}}" alt="ordenar" width="28">
                </div>

                <div class="link-item-info">
                    <div class="link-item-title">{{$link->title}}</div>
                    <div class="link-item-href">{{$link->href}}</div>
                </div>

                <div class="link-item-buttons">
                    <a href="{{url('/admin/'.$page->slug.'/editlink/'.$link->id)}}">Editar</a>
                    <a href="{{url('/admin/'.$page->slug.'/deletelink/'.$link->id)}}">Excluir</a>
                </div
            </li>
        @endforeach
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
    <script>
         new Sortable(document.querySelector('#links'), {
           animation: 150, 
           onEnd: async(e) => {
               let id = e.item.getAttribute('data-id');
               let link = `{{url('/admin/linkorder/${id}/${e.newIndex}')}}`;
               await fetch(link);
               window.location.href = window.location.href;
           }
        });
    </script>
@endsection