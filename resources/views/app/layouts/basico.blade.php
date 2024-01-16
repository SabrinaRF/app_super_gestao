<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - ADM  @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/estilo_basico')}}">
    </head>

    <body>
        @include('app.layouts._partials.nav')
        @yield('conteudo')<!-- local onde o conteudo vai ficar alocado -->
    </body>
</html>