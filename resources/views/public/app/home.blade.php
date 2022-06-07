@extends('public.layout.layout')

@section('content')
  @include('public.app.homepage.snippets.slider')
  @include('public.app.homepage.snippets.search')
  @include('public.app.homepage.snippets.newsfeed')
  @include('public.app.homepage.snippets.partners')
@endsection
