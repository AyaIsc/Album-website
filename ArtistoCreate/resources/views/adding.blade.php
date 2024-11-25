@extends('canvas')

@section('title', 'Adding Album')

@section('article-content')
<article>
    <h1>Create a New Album</h1>
    <form action="{{ route('createAlbum') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" required><br><br>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required><br><br>

        <label for="cover">Cover:</label>
        <input type="text" id="cover" name="cover" required><br><br>

        <input type="submit" value="Create">
    </form>

    @if(Session::has('success'))
        <div style="background-color: green; color: white; padding: 10px;">
            {{ Session::get('success') }}
        </div>
    @endif
</article>
@endsection
