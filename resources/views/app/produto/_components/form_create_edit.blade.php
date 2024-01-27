 @if (isset($produto->id))
    <form method="post" action="{{ route('produto.update',['produto' => $produto->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produto.store')}}">
    @csrf
@endif  

    <select name="fornecedor_id">
        <option> -- Selecione um Fornecedor -- </option>
        @foreach ($fornecedores as $fornecedor )
            <option value="{{ $fornecedor->id }}"{{ ($produto->fornecedor_id ?? old('fornecedor_id'))  == $fornecedor->id ? 'selected' : ' '  }}>{{ $fornecedor->nome }}</option>
        @endforeach
        
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}

    <input name="nome" value="{{ $produto->nome ?? old('nome')}}" type="text" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

    <input name="descricao" value="{{ $produto->descricao ?? old('descricao')}}" type="text" placeholder="Descrição" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

    <input name="peso" value="{{ $produto->peso ?? old('peso')}}" type="number" placeholder="Peso" class="borda-preta">         
    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

    <select name="unidade_id">
        <option> -- Selecione uma Unidade de Medida -- </option>
        @foreach ($unidades as $unidade )
            <option value="{{ $unidade->id }}"{{ ($produto->unidade_id ?? old('unidade_id'))  == $unidade->id ? 'selected' : ' '  }}>{{ $unidade->descricao }}</option>
        @endforeach
        
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

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