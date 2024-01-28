@extends('app.layouts.basico')
@section('titulo', 'Clientes')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>CLIENTE</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}"> Novo Cliente</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto; margin-right:auto;">
                <table border="1" width=100%>
                    <thered>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </th>
                    </thered>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            
                            <td><a href="{{ route('cliente.show', ['cliente'=>$cliente->id])}}">Visualizar</a></td>
                            <td><a href="{{ route('cliente.edit', ['cliente'=>$cliente->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente'=>$cliente->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                Exibindo {{ $clientes->count()}} clientes de {{ $clientes->total()}} (de  {{ $clientes->firstItem()}} a {{ $clientes->lastItem()}} )
            </div>
       </div>

    </div>

@endsection