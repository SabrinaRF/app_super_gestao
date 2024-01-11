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


        $request->validate([
            'nome'=>'required|min:3|max:40',
            'telefone'=> 'required',
            'email'=> 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:2000'
        ]);
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
