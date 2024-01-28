@extends('app.layouts.basico')
@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>PEDIDO</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}"> Novo Pedido</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto; margin-right:auto;">
                <table border="1" width=100%>
                    <thead>
                    <tr>
                        <th>ID do Pedido</th>
                        <th>cliente_id</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('pedido-produto.create', ['pedido'=>$pedido->id])}}">Adicionar Produto</a></td>
                            <td><a href="{{ route('pedido.show', ['pedido'=>$pedido->id])}}">Visualizar</a></td>
                            <td><a href="{{ route('pedido.edit', ['pedido'=>$pedido->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido'=>$pedido->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                Exibindo {{ $pedidos->count()}} pedidos de {{ $pedidos->total()}} (de  {{ $pedidos->firstItem()}} a {{ $pedidos->lastItem()}} )
            </div>
       </div>

    </div>

@endsection