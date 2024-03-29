@extends('app.layouts.basico')
@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index')}}"> Voltar</a></li>
                <li><a href="" >Listagem de Produto</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:50%;margin-left: auto; margin-right:auto;">
                <table border="1" style="text-align:left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $produto->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $produto->peso}}</td>
                    </tr>
                    <tr>
                        <td>Unidade de medida:</td>
                        <td>{{ $produto->unidade_id}}</td>
                    </tr>
                </table>
                <ul>
                    <li><a href="{{ route('produto_detalhe.create')}}"> Adicionar Detalhes do Produto</a></li>
                <ul>
            </div>
       </div>

    </div>

@endsection