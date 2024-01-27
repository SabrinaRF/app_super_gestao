@extends('app.layouts.basico');
@section('titulo','Detalhes Produto');

@section('conteudo');

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Editar Detalhes do Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=""></a></li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <h4>Produto</h4>
            <div>Nome:{{$produto_detalhe->produto->nome }}</div>
            <br>
            <div>Descrição:{{$produto_detalhe->produto->descricao }}</div>
            <br>

            <div style="width:50%;margin-left: auto; margin-right:auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe'=>$produto_detalhe,'unidades'=>$unidades])
                <p> Editar Detalhes do Produto</p>
            @endcomponent
            </div>
        </div>

    </div>

@endsection