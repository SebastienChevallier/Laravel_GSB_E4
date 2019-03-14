<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="lcoul-schev-vaube">

    <title>GSB-E4</title>

    <!-- Bootstrap core CSS -->
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/bootstrap-theme.css') !!}
    {!! Html::style('assets/css/bootstrap-litera.min.css') !!}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    @yield('css')

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Menu<span class="sr-only">(current)</span></a>
            </li>
            @if (Session::get('id') > 0)
            <li class="nav-item">
                <a class="nav-link" href="#">Ajouter un interaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/getListeMedicaments') }}">Lister les médicaments</a>
            </li>
            @endif
            @if (Session::get('id') == 0)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/getLogin') }}">Connexion</a>
            </li>
            @endif

        </ul>

    </div>
</nav>
<div class="container">
    @yield('content')
</div>

</body>
</html>