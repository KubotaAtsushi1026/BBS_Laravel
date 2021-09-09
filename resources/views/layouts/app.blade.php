<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-3">
                <h1 class=" col-sm-12 text-center">@yield('header')</h1>
            </div>
            
            @include('commons.flash_message')
            @include('commons.errors')
            
            @yield('content')
            
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>