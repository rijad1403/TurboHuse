<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <!-- <link rel="stylesheet" href=" {{secure_asset('./css/app.css')}} "> -->
    <link rel="stylesheet" href=" {{asset('./css/app.css')}} ">

    <title>TurboHuse</title>
</head>

<body>
    @include('partials.header')
    @include('partials.navbar')
    @if ((!Auth::user() && Route::current()->uri !== 'prijava' && Route::current()->uri !== 'registracija' &&
    Route::current()->uri !== 'kosara')
    || (Auth::user() && Auth::user()->type == 'user' && Route::current()->uri !=='kosara' && Route::current()->uri
    !=='profil')
    || (Auth::user() && Auth::user()->type == 'admin' && Route::current()->uri == '*'))
    @include('partials.hero')
    @endif
    @yield('content')
    @include('partials.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>