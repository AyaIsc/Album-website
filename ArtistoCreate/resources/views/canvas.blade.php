<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/template.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div id="header">
        <h1> WEB4 album photos- @yield('title')</h1>
    </div>
    <br>
    @yield('content')

    <div id="nav">
        <nav>
            <ul>
                <li><a href="/accueil">accueil</a></li>
                <li><a href="/albums">albums</a></li>
                <li><a href="/musicians">musicians</a></li>
                <li><a href="/adding"> ajouter un album</a></li>
            </ul>
        </nav>
    </div>
    @section('content')
    <div id="article">
        <article>
        @yield('article-content')
        </article>
    </div>

    <div id="footer">
        <footer>
            <p>site web créé par 58414</p>
        </footer>
    </div>
</body>
</html>


