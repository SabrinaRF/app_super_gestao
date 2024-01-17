<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){ 
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){

        $fornecedores= Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores'=>$fornecedores, 'request'=>$request->all() ]);///aqui
    }

    public function adicionar(Request $request){

        $msg = '';
        //validação dos dados
        if($request->input('_token') != '' && $request->input('id') != '' ){

            $regras = [
                'nome'=>'required|min:3|max:40',
                'uf'=> 'required|min:2|max:2',
                'email'=> 'email',
                'site'=> 'required'
            ];

            $feedback =[
                'nome.min'=> 'O campo nome deve ter no mínimo 3 caracteres!',
                'nome.max'=> 'O campo nome deve ter no máximo 40 caracteres',
                'email.email'=> 'O email informado não é válido!',
                //generico
                'required'=> 'O campo :attribute é obrigatório!'
            ];

            $request->validate($regras,$feedback);
        
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg ="Cadastro realizado com sucesso!";

        }

        if($request->input('_token') != '' && $request->input('id') ){

            $fornecedor = Fornecedor::find($request->input('id'));
            $update =$fornecedor->update($request->all());

            if ($update) {
                $msg ="Atualização realizada com sucesso!";
            } else {
                $msg ="Erro ao realizar a atualização!";

            }
            return redirect()->route('app.fornecedor.editar',['id'=>$request->input('id'),'msg'=>$msg]);

        }
            return view('app.fornecedor.adicionar',['msg'=>$msg]);
        
        
    }
    public function editar($id,$msg = ''){
        
        $fornecedor=Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor'=>$fornecedor,'msg'=>$msg]);

    }
    
}
