 @if (isset($cliente->id))
    <form method="post" action="{{ route('cliente.update',['cliente' => $cliente->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store')}}">
    @csrf
@endif  

    <input name="nome" value="{{ $cliente->nome ?? old('nome')}}" type="text" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

    <button type="submit" class="borda-preta">Adicionar</button>
</form>