@extends('layouts.main')

@section('main-content')
    @include('comics.includes.formEditUpdate', [
        'routeName' => 'comics.update',
        'data' => $comic->id,
        'methodName' => 'PUT',
    ])
    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="form-delete">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn-delete">
            Delete
        </button>
    </form>
{{-- <form action="{{ route('comics.update', $comic->id) }}" method="post">
        @method('PUT')
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title',$comic->title) }}">
            @include('comics.includes.errors', [
                'errorType' => 'title',
            ])
        </div>

        <div>
            <label for="description">Description</label>
            <textarea class="w-textarea" name="description" id="description" cols="30" rows="10">
                {{ old('description',$comic->description) }}
            </textarea>
            @include('comics.includes.errors', [
                'errorType' => 'description',
            ])
        </div>

        <div>
            <label for="thumb">Thumb</label>
            <input type="text" name="thumb" value="{{ old('thumb',$comic->thumb) }}">
            @include('comics.includes.errors', [
                'errorType' => 'thumb',
            ])
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" name="price" value="{{ old('price',$comic->price) }}">
            @include('comics.includes.errors', [
                'errorType' => 'price',
            ])
        </div>

        <div>
            <label for="series">Series</label>
            <input type="text" name="series" value="{{ old('series',$comic->series) }}">
            @include('comics.includes.errors', [
                'errorType' => 'price',
            ])
        </div>

        <div>
            <label for="sale-date">Sale Date</label>
            <input type="date" name="sale-date" value="{{ old('sale_date',$comic->sale_date) }}">
            @error('sale-date')
                <div class="validation-failed">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="type">Type</label>
            <input type="text" name="type" value="{{ old('type',$comic->type) }}">
            @error('type')
                <div class="validation-failed">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <button class="btn-edit" type="submit">Edit</button>
        </div>
    </form>
    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="form-delete">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn-delete">
            Delete
        </button>
    </form> --}}
@endsection