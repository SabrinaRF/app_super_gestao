@extends('app.layouts.basico')
@section('titulo', 'Produtos - Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index')}}"> Voltar</a></li>
                <li><a href="#"> Consultar</a></li>
            <ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do Pedido </h4>
            <p>ID do Pedido:{{$pedido->id}}</p>
            <p>ID Cliente: {{$pedido->cliente_id}}</</p>

            <div style="width:50%;margin-left: auto; margin-right:auto;">
            <h4>Itens do Pedido </h4>
            <table border="1" width=100%>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Data de Inclusão</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td>
                               </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            @component('app.pedido_produto._components.form_create', ['pedido'=>$pedido, 'produtos'=>$produtos])
                
            @endcomponent
            </div>
        </div>

    </div>

@endsection