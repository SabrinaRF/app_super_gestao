 @if (isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto_detalhe.update',['produto_detalhe' => $produto_detalhe->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produto_detalhe.store')}}">
    @csrf
@endif  
    <input name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id')}}" type="text" placeholder="ID do Produto" class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}

    <input name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" type="text" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''}}

    <input name="largura" value="{{ $produto_detalhe->largura ?? old('largura')}}" type="text" placeholder="Largura" class="borda-preta">
    {{ $errors->has('largura') ? $errors->first('largura') : ''}}

    <input name="altura" value="{{ $produto_detalhe->altura ?? old('altura')}}" type="number" placeholder="Altura" class="borda-preta">         
    {{ $errors->has('altura') ? $errors->first('altura') : ''}}

    <select name="unidade_id">
            
        @foreach ($unidades as $unidade )
            <option value="{{ $unidade->id }}"{{ ($produto_detalhe->unidade_id ?? old('unidade_id'))  == $unidade->id ? 'selected' : ' '  }}>{{ $unidade->descricao }}</option>
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