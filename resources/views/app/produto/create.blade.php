@extends('app.layouts.basico')
@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
         <div class="titulo-pagina">

         @if (isset($produto->id))
            <p>Editar Produto</p>
         @else
            <p>Adicionar Produto</p>
        @endif

        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index')}}"> Voltar</a></li>
            <ul>
       </div>
      <div class="informacao-pagina">
            <div style="width:50%;margin-left: auto; margin-right:auto;">
            @component('app.produto._components.form_create_edit', ['fornecedores'=>$fornecedores,'unidades'=>$unidades])
                <p> Cadastrar do Produto</p>
            @endcomponent
            </div>
        </div>

    </div>

@endsection