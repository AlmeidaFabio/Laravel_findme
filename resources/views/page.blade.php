<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{url('assets/css/page.css')}}">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: {{$font_color}};
            background: {{$bg}};

            .banner a {
                color: {{$font_color}}
            }
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="profile-image">
            <img src={{$profile_image}} alt="">
        </div>
    
        <div class="profile-title">
            {{$title}}
        </div>
    
        <div class="profile-description">
            {{$description}}
        </div>
    
        <div class="links-area">
            @foreach($links as $link) 
                <a href="{{$link->href}}" 
                    class="link{{$link->op_border_type}}"
                style="background-color: {{$link->op_bg_color}}; color:{{$link->op_text_color}}"
                target="blank"                   
                    >{{$link->title}}
                </a>
            @endforeach
        </div>
    
        <div class="banner">
            <span>@AlmeidaFabio</span>
        </div>
    </div>

    @if(!empty($fb_pixel))

    @endif
</body>
</html>