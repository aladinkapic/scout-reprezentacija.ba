@extends('public.layout.layout')

@section('content')
    <div class="my__profile__wrapper">
        @include('public.users.snippets.left_menu')

        <div class="content__part">
            {!! Form::open(array('route' => 'system.blog-posts.save', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
            {!! Form::hidden('category', '0', ['class' => 'form-control']) !!}
            {!! Form::hidden('owner', Auth()->user()->id ?? '', ['class' => 'form-control', 'id' => 'owner']) !!}
            {!! Form::hidden('edit_post', '', ['class' => 'form-control', 'id' => 'edit_post']) !!}
            {!! Form::hidden('edit_post_image', '', ['class' => 'form-control', 'id' => 'edit_post_image']) !!}
            {!! Form::hidden('post_id', '', ['class' => 'form-control', 'id' => 'post_id']) !!}

            @include('public.users.posts.blog.new-post')
            {!! Form::close(); !!}


            @include('public.users.posts.blog.all-posts', ['data' => Auth()->user()->blogPosts, 'user' => Auth()->user()])
        </div>
    </div>
@endsection


@section('additional-scripts')
    <!-- Crop images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endsection
