<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('assets/css/admin.template.css')}}">
</head>
<body>
    <nav>
        @yield('nav')
    </nav>

    <section class="container">
        @yield('content')
    </section>
</body>
</html>