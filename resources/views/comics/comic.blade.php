@extends('layouts.main')

@section('main-content')
    @if ( session('created') ) 
        <div class="created-alert">
            <h1>{{ session('created') }} has created succesfully</h1>
        </div>
    @elseif ( session('edited') )
        <div class="created-alert">
            <h1>{{ session('edited') }} has been modified succesfully</h1>
        </div>
    @endif
    <div class="container-show">
        <h2>Image: {{ $comic->thumb }}</h2>
    </div>
    <div class="details-comic">
        <div>
            <h1>Title: {{ $comic->title }}</h1>
            <div>
                <h4>Series: {{ $comic->series }}</h4>
                <p>Description: {{ $comic->description }}</p>
            </div>
        </div>
    </div>
    <div class="container-show">
        <pre>€{{ $comic->price }} | {{ $comic->sale_date }} | {{ $comic->type }}</pre>
    </div>
@endsection