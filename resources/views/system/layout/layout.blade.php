<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="bs" > <!-- oncontextmenu="return false" -->
    <head>
        <title> {{ __('Dobrodošli') }} </title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/auth/logo.ico')}}"/>

        <!-- CSS files + fonts -->
        <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- JavaScript files -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Crop images -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    </head>
    <body>
        <div id="main-div"></div>
        <!-- Import MENU -->
        @include("system.layout.snippets.menu.menu")
        @include('system.app.users.snippets.crop-image')
        <div class="main-content">
            <!-- Basic header of every page -->
            @include("system.layout.snippets.page-header")

            <!-- Main content of every page -->
            @yield('content')
        </div>
    </body>
</html>
