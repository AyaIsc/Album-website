@extends('canvas')

@section('title', 'Albums')

@section('article-content')
<article>
@foreach($arrayAlbums as $album)
    <div>
        <h1>{{ $album['title'] }}</h1>
        <img src="{{ asset('img/'.$album['cover']) }}" alt="album cover" width="300" height="300">
        <li>Artist: {{ $album['artist'] }}</li>
        <li>Year: {{ $album['year'] }}</li>
        <li>Musicians:
            @foreach ($albumMusicians[$album['id']] as $musician)
                <a href="/discography/{{ $musician->id }}">{{ $musician->name }} {{ $musician->firstname }}</a>
                &nbsp;
            @endforeach
        </li>
    </div>
@endforeach

</article>

@endsection