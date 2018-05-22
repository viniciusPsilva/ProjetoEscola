<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <!-- MATERIALISE Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS geral da aplicação-->
    <link href="{{url('css/app-css.css')}}" rel="stylesheet">
    <!--MATERIALIZE Compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

</head>
<body class="grey lighten-5">
@include('template.menu')
@yield('content')

</body>
</html>