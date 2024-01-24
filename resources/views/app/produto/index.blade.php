@extends('app.layouts.basico');
@section('titulo', 'Produtos');

@section('conteudo');

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create')}}"> Novo Produto</a></li>
                <li><a href="" >Listagem de Produtos</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto; margin-right:auto;">
                <table border="1" width=100%>
                    <thered>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
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
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td><a href="{{ route('produto.show', ['produto'=>$produto->id])}}">Visualizar</a></td>
                            <td><a href="">Editar</a></td>
                             <td><a href="">Excluir</a></td>
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