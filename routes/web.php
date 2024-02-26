<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return "Olá seja bem vindo ao curso";
});
Route::get('/sobre-nos', function () {
    return "sobre nos";
});
Route::get('/contato', function () {
    return "contato
    ";
});
*/

/*

Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        string $nome= 'Desconhecido', 
        int $categoria_id= 1 //1- Informação
    ){
        echo'Estamos aqui: '.$nome.' - '.$categoria_id;   
    }
)->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');*/
// trabalhando com envio de parametros - ? o laravel identifica que não é obrigatório


Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@home')->name('app.home');   
    Route::get('/sair', 'LoginController@sair')->name('app.sair');   

    //fornecedor
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    //produtos
    Route::resource('produto','ProdutoController');
    //produto detalhe
    Route::resource('produto_detalhe','ProdutoDetalheController');
    //pedido 
    Route::resource('pedido','PedidoController');
    //clinte
    Route::resource('cliente','ClienteController');
    //pedido produto
    //Route::resource('pedido-produto','PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');

});

//Route::redirect('/rota1','/rota2');
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'" >Clique aqui</a> para ir para a página principal';
});
Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('site.teste');






