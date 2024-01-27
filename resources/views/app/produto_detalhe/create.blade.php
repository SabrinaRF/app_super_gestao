@extends('app.layouts.basico');
@section('titulo', ' Detalhes Produto');

@section('conteudo');

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Cadastrar Detalhes do Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=""></a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:50%;margin-left: auto; margin-right:auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['unidades'=>$unidades])
                <p> Cadastrar Detalhes do Produto</p>
            @endcomponent
            </div>
        </div>

    </div>

@endsection