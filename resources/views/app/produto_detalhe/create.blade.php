@extends('app.layouts.basico');
@section('titulo', 'Produto Detalhes');

@section('conteudo');

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Cadastrar Detalhes do Produto</p>
        </div>

       <div class="informacao-pagina">
            <div style="width:50%;margin-left: auto; margin-right:auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['classe'=>"borda-preta", 'produto_detalhe'=>$produto_detalhe])
                <p> Cadastrar Detalhes do Produto</p>
            @endcomponent
            </div>
       </div>

    </div>

@endsection