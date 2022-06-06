<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="bs">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{ __('Scout.Reprezentacija.BA') }}</title>

    <link rel="stylesheet" href="{{asset('css/public.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('public.layout.menu')
    @yield('content')
    @include('public.layout.footer')
    <script src="{{ asset('js/public.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</body>
</html>
