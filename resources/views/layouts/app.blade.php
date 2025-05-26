<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="{{ asset('assets/logo.png')}}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <title>{{ $title ?? config('app.name') }}</title>
     <style>
         body {
             background: lightgray;
             font-family: 'Quicksand', sans-serif
         }
     </style>
 </head>
 <body class="d-flex flex-column min-vh-100">
    {{-- Header Navbar --}}
    @if (!in_array(Route::currentRouteName(), ['login', 'register']))
        <div class="fixed-navbar">
            @include('partials.navbar')
        </div>
    @endif
    {{-- Main Content --}}
    <div class="flex-grow-1 scrollable-content">
        <div>
            @yield('content')
        </div>
    </div>

    {{-- Footer --}}
    @if (!in_array(Route::currentRouteName(), ['login', 'register']))
        <div class="fixed-footer">
            @include('partials.footer')
        </div>
    @endif
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
 </html>