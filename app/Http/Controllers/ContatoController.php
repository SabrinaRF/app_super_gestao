<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;
use GuzzleHttp\Promise\Create;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['titulo' => 'Contato','motivo_contatos' => $motivo_contatos ]);
    }

    public function salvar(Request $request){
        
        //validação dos dados

        $regras = [
            'nome'=>'required|min:3|max:40',
            'telefone'=> 'required',
            'email'=> 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:2000'
        ];

        $feedback =[
            'nome.required'=> 'O campo nome é obrigatório!',
            'nome.min'=> 'O campo nome deve ter no mínimo 3 caracteres!',
            'nome.max'=> 'O campo nome deve ter no máximo 40 caracteres',
            'email.email'=> 'O email informado não é válido!',
            'motivo_contatos_id.required'=> 'O campo motivo é obrigatório!',
            'mensagem.required'=> 'A mensagem é um campo obrigatório!',
            'mensagem.max'=> 'A mensagem deve conter no máximo 2000 caracteres!',

            //generico
            'required'=> 'O campo :attribute nome é obrigatório!'
        ];

        $request->validate($regras,$feedback);

        //SiteContato::create($request->all());
        
        $contato = new SiteContato();
        $contato->name = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contatos_id = $request->input('motivo_contatos_id');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();

        return redirect()->route('site.index');
    }
}
