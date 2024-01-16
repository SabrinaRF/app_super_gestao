@extends('app.layouts.basico');
@section('titulo', 'Fornecedor');

@section('conteudo');

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=" {{route('app.fornecedor.adicionar')}}"> Novo Fornecedor</a></li>
                <li><a href="{{route('app.fornecedor.listar')}}" >Listagem de Fornecedores</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto; margin-right:auto;">
                <form method="post" action="{{ route('app.fornecedor.listar')}}">
                    @csrf
                    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="borda-preta">
                    <input name="site" value="{{old('site')}}" type="text" placeholder="Site" class="borda-preta">
                    <input name="uf" value="{{old('uf')}}" type="text" placeholder="Uf" class="borda-preta">                    
                    <input name="email" value="{{old('email')}}" type="email" placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
       </div>

    </div>

@endsection