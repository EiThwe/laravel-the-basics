<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',@env('APP_NAME'))</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
    <nav class="border rounded p-3 m-3">
        <a href="{{route('page.home')}}" class="btn btn-outline-primary">Home</a>
        <a href="{{route('page.about')}}" class="btn btn-outline-primary">About</a>
        <a href="{{route('page.contact')}}" class="btn btn-outline-primary">Contact</a>
    </nav>
    
    <hr>
    @yield('content')   
    <script src="{{asset('js/bootstrap.bundle.min.js')}}">

    </script>
</body>
</html>