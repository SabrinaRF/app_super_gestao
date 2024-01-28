@extends('app.layouts.basico')
@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Adicionar Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index')}}"> Voltar</a></li>
            <ul>
       </div>
      <div class="informacao-pagina">
            <div style="width:50%;margin-left: auto; margin-right:auto;">
            @component('app.pedido._components.form_create_edit', ['clientes'=>$clientes])
                <p> Cadastrar do Pedido</p>
            @endcomponent
            </div>
        </div>

    </div>

@endsection