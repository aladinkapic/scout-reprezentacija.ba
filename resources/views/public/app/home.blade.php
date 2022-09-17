@extends('public.layout.layout')

@section('content')
    @include('public.app.homepage.snippets.slider')

    <div class="home-quotes">
        <div class="hq-wrapper">
            @foreach($quotes as $quote)
                <div class="hq-quote">
                    <div class="hq-q-img">
                        <img src="{{ asset('images/quotes/' . ($quote->image ?? '' )) }}" alt="">
                    </div>
                    <div class="hq-q-text">
                        <div class="hq-q-t-header">
                            <p> {{ $quote->quote ?? '' }} </p>

                            <footer class="blockquote-footer mt-3"> <b> {{ $quote->name ?? '' }} </b> <cite> {{ $quote->title ?? '' }} </cite></footer>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('public.app.homepage.snippets.search')
    @include('public.app.homepage.snippets.newsfeed')
    @include('public.app.homepage.snippets.partners')
@endsection
