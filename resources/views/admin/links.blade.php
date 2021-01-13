@extends('admin.page')

@section('body')
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