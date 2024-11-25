@extends('canvas')


@section('title', 'musicians')

@section('article-content')
<article>
    <h1> selectionnez 1 ou plusieurs musicians </h1>

    @foreach($musicians as $musician)
        <div>
            <input type="checkbox" id="{{ $musician->musId }}" name="{{ $musician->musId }}" >
            <label >  {{ $musician->firstname}} {{  $musician->name}}</label>
        </div>
    @endforeach

    <h2> Albums </h2>

    <div id="albums"  style="display: inline-block;"></div>

    

    <script>
   $(document).ready(function() {
    if ($('#albums').is(':empty')) {
    }

    $("input:checkbox").change(function() {
        let musicianId = $(this).attr("id");
        if ($(this).is(":checked")) {
            $.ajax({
                url: "api/musician/" + $(this).attr("id") + "/albums",
                success: function(data) {
                    for (let albums of data) {
                        console.log(data);
                        let classal = "." + albums.albumId; //class de l'album
                        if ($(classal).length) {
                            // si cette classe existe deja je n'affiche pas l'album
                        } else {
                            $('#vide2').remove();
                            $(`#albums`).append(`<h1 class="${albums.albumId} ${musicianId}">${albums.title}</h1>
                            <img src={{ asset('img/${albums.cover}') }} alt="album cover" width="300" height="300" class="${albums.albumId} ${musicianId}">
                            <li class="${albums.albumId} ${musicianId}">Artist :${albums.artist} (${albums.year})</li>`);
                        }
                    }
                },
            });
        } else {
            let musicianId = $(this).attr("id");
            $.ajax({
                url: "api/musician/" + $(this).attr("id") + "/albums",
                success: function(data) {
                    for (let albums of data) {
                        $("." + musicianId).remove();
                    }
                },
            });
        }
    });
});

    </script>

</article>

@endsection

