@extends('canvas')

@section('title', 'discography')

@section('article-content')
<article>
    @foreach($discography as $disco)

    <div >
        <h1>{{ $disco->name }}  {{ $disco->firstname }}</h1>
        <div >
            <h1>{{ $disco->title }}</h1>
            <img src={{ asset('img/'.$disco->cover) }} alt="album cover"  width="300" height="300">
        
            <li>Artist :{{ $disco->artist }} </li>
            <li>Year : {{  $disco->year}}</li>
            <li id="musicians" >Musicians : ???</li>
            
        </div>
        <br>
    </div>
    @endforeach

</article>

@endsection