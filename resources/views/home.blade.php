@extends('layouts.main')

@section('main-content')
    <div class="centered-table">
        @if ( session('deleted') )
            <div class="delete-alert">
                <h1>{{ session('deleted') }} Removed succesfully</h1>
            </div>
        @endif
        <table>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Series</th>
                <th>Sale_Date</th>
                <th>Type</th>
            </tr>

            @forelse ($comic as $comic )
                <tr>
                    <td>
                        <a href="{{ route('comics.show', $comic->id) }}">
                            {{ $comic->title }}
                        </a>
                    </td>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->sale_date }}</td>
                    <td>{{ $comic->type }}</td>
                    <td>
                        <a href="{{ route('comics.edit', $comic->id) }}"><button>Edit</button></a>

                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="form-delete">
                            @method('DELETE')
                            @csrf
                            <button type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection