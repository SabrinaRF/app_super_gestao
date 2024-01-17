@extends('app.layouts.basico');
@section('titulo', 'Fornecedor');

@section('conteudo');

    <div class="conteudo-pagina">
         <div class="titulo-pagina">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}"> Novo Fornecedor</a></li>
                <li><a href="{{route('app.fornecedor.listar')}}" >Listagem de Fornecedores</a></li>
            <ul>
       </div>
       <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto; margin-right:auto;">
            {{ $msg  ?? ''}}
                <form method="post" action="{{ route('app.fornecedor.adicionar')}}">
                    <input name="id" value="{{ $fornecedor->id ?? '' }}" type="hidden" >
                    @csrf
                    <input name="nome" value="{{ $fornecedor->nome ?? old('nome')}}" type="text" placeholder="Nome" class="borda-preta">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}

                    <input name="site" value="{{ $fornecedor->site ?? old('site')}}" type="text" placeholder="Site" class="borda-preta">
                        {{$errors->has('site') ? $errors->first('site') : ''}}

                    <input name="uf" value="{{ $fornecedor->uf ?? old('uf')}}" type="text" placeholder="Uf" class="borda-preta">         
                        {{$errors->has('uf') ? $errors->first('uf') : ''}}       

                    <input name="email" value="{{ $fornecedor->email ?? old('email')}}" type="email" placeholder="E-mail" class="borda-preta">
                        {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
                 @if ($errors->any())
                    <div style="position:center; top:0px; left:0px; width:100%; background:red;">
                        @foreach ($errors->all() as $error )
                            {{$error}}
                            <br>
                        @endforeach
                    </div>
                @endif
            </div>
       </div>

    </div>

@endsection