<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="bs">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{ __('Scout.Reprezentacija.BA') }}</title>

    <link rel="stylesheet" href="{{asset('css/public.css')}}">
    <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('public.layout.menu')
    @yield('content')
    @include('public.layout.footer')
    <script src="{{ asset('js/public.js') }}"></script>
</body>
</html>
