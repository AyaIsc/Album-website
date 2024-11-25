@extends('canvas')

@section('title', 'albums')

@section('article-content')
<article>
@foreach($arrayAlbums as $album)
    <div>
        <h1>{{ $album['title'] }}</h1>
        <img src="{{ asset('img/'.$album['cover']) }}" alt="album cover" width="100" height="100">
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
