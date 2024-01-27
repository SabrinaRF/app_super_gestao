@extends('app.layouts.basico')
@section('titulo', 'Produtos')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>PRODUTO</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}"> Novo Produto</a></li>
                <li><a href="{{ route('produto.index') }}" >Listagem de Produtos</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto; margin-right:auto;">
                <table border="1" width=100%>
                    <thered>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </th>
                    </thered>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->produtoDetalhe->comprimento ?? " " }}</td>
                            <td>{{ $produto->produtoDetalhe->largura ?? " "}}</td>
                            <td>{{ $produto->produtoDetalhe->altura ?? " "}}</td>
                            <td><a href="{{ route('produto.show', ['produto'=>$produto->id])}}">Visualizar</a></td>
                            <td><a href="{{ route('produto.edit', ['produto'=>$produto->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto'=>$produto->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a></td>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links()}}
                
                Exibindo {{ $produtos->count()}} produtos de {{ $produtos->total()}} (de  {{ $produtos->firstItem()}} a {{ $produtos->lastItem()}} )
            </div>
       </div>

    </div>

@endsection