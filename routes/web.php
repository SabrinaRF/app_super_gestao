<?php

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

//Route::get($uri,$callback);// rota, ação que deve ser tomada.
/*Verbos http
get
post
put
patch
deelete
options

principais verbios, para controlar o servidar da aplicação
*/


Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');
//nome,categoria, assunto, mensagem

Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        string $nome= 'Desconhecido', 
        int $categoria_id= 1 //1- Informação
    ){
        echo'Estamos aqui: '.$nome.' - '.$categoria_id;   
    }
)->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');
// trabalhando com envio de parametros - ? o laravel identifica que não é obrigatório
