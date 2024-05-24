<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="bs">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>@yield('title', __('Scout.Reprezentacija.BA'))</title>

    <link rel="stylesheet" href="{{asset('css/public.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/LogoMali.png') }}"/>

    <!-- First content sentence -->
    <meta name="description" content="@yield('seo_description', 'Scout.Reprezentacija.BA Vam predstavlja igrače iz Bosne i Hercegovine i ...')">
    <!-- Current URI -->
    <link rel="canonical" href="@yield('seo_uri', 'https://scout.reprezentacija.ba/')">

    <meta property="fb:app_id" content="1747958558874326"/>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="@yield('seo_title', 'Scout Reprezentacija.BA')">
    <meta property="og:url" content="@yield('seo_uri', 'https://scout.reprezentacija.ba/')">
    <meta property="og:title" content="@yield('seo_title', 'Scout Reprezentacija.BA')">
    <meta property="og:description" content="@yield('seo_description', 'Scout.Reprezentacija.BA Vam predstavlja igrače iz Bosne i Hercegovine i ...')">
    <meta property="og:image" content="@yield('seo_image', asset('images/hero/hero-wallpaper.jpg'))">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@scout-reprezentacija-ba">
    <meta name="twitter:title" content="@yield('seo_title', 'Scout Reprezentacija.BA')">
    <meta name="twitter:description" content="@yield('seo_description', 'Scout.Reprezentacija.BA Vam predstavlja igrače iz Bosne i Hercegovine i ...')">
    <meta name="twitter:image" content="@yield('seo_image', asset('images/hero/hero-wallpaper.jpg'))">
</head>
<body>
    @include('public.layout.menu')
    @include('public.layout.public-notification')

    @yield('content')
    @include('public.layout.footer')
    <script src="{{ asset('js/public.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</body>
</html>
