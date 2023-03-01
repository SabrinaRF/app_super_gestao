<h3>fornecedores</h3>

{{-- fica o comentario --}}

@php
// o laravel entende que o @php como php puro.

    /*
    @if (count($fornecedores) > 0 && count($fornecedores)< 10)
        <h3>Existem alguns fornecedores cadastrados</h3>
    @elseif (count($fornecedores)> 10)
        <h3>Existem vários fornecedores cadastrados</h3>
    @else
        <h3>Ainda não existem fornecedores cadastrados</h3>
    @endif
    */
    /*
    @if ($fornecedores[0]['status'] == 'N')
        Fornecedor inativo
    @endif
    <br>
    @unless($fornecedores[0]['status'] == 'S')
        Fornecedor ativo
    @endunless*/

    if(isset($variavel)){

    }
@endphp

@isset($fornecedores)
    Fornecedor:{{ $fornecedores[0]['nome'] }}<br>
    Status:{{ $fornecedores[0]['status'] }}<br>
    CNPJ:{{ $fornecedores[0]['cnpj'] }}<br>
@endisset
@isset($fornecedores)
    Fornecedor:{{ $fornecedores[1]['nome'] }}<br>
    Status:{{ $fornecedores[1]['status'] }}<br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ:{{ $fornecedores[1]['cnpj'] }}<br>
    @endisset
@endisset

