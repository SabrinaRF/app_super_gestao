<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/estilo_basico')}}">
    </head>

    <body>
        @include('site.layouts._partials.nav')
        @yield('conteudo')<!-- local onde o conteudo vai ficar alocado -->
    </body>
</html>