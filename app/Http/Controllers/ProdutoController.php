<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos= Produto::with(['produtoDetalhe','fornecedor'])->paginate(5);//with(['produtoDetalhe']) Eager Loading | Lazy Loading (padrão)

        /* Opção 1: não muito recomendada
        foreach($produtos as $key => $produto){
         
            $produto_detalhes = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if (isset($produto_detalhes)) {

                $produtos[$key]['comprimento'] = $produto_detalhes->comprimento;
                $produtos[$key]['largura'] = $produto_detalhes->largura;
                $produtos[$key]['altura'] = $produto_detalhes->altura;
            }
        }*/

        return view('app.produto.index', ['produtos'=>$produtos, 'request'=>$request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['fornecedores'=>$fornecedores,'unidades'=>$unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$msg = '';

        //validação dos dados
        //if($request->input('_token') != '' && $request->input('id') != '' ){

            $regras = [
                'nome'=>'required|min:3|max:40',
                'descricao'=> 'required|max:2000',
                'peso'=> 'required|integer',
                'unidade_id'=> 'exists:unidades,id',
                'fornecedor_id'=> 'exists:fornecedores,id'
            ];

            $feedback =[
                //generico
                'required'=> 'O campo :attribute é obrigatório!',
                //especifico
                'nome.min'=> 'O campo nome deve ter no mínimo 3 caracteres!',
                'nome.max'=> 'O campo nome deve ter no máximo 40 caracteres',
                'descicao.max'=> 'O campo descrição deve ter no máximo 2000 caracteres!',
                'peso.integer'=> 'O campo peso deve ser um número inteiro',
                'unidade_id.exists'=> 'A unidade de medida informada não existe',
                'fornecedor_id.exists'=> 'A fornecedor informado não existe'
            ];

            $request->validate($regras,$feedback);
        //}

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        //return view('app.produto.edit', ['produto' => $produto,'unidades'=>$unidades]);
        
        return view('app.produto.edit', ['fornecedores'=>$fornecedores,'produto' => $produto,'unidades'=>$unidades]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $regras = [
            'nome'=>'required|min:3|max:40',
            'descricao'=> 'required|max:2000',
            'peso'=> 'required|integer',
            'unidade_id'=> 'exists:unidades,id',
            'fornecedor_id'=> 'exists:fornecedores,id'
        ];

        $feedback =[
            //generico
            'required'=> 'O campo :attribute é obrigatório!',
            //especifico
            'nome.min'=> 'O campo nome deve ter no mínimo 3 caracteres!',
            'nome.max'=> 'O campo nome deve ter no máximo 40 caracteres',
            'descicao.max'=> 'O campo descrição deve ter no máximo 2000 caracteres!',
            'peso.integer'=> 'O campo peso deve ser um número inteiro',
            'unidade_id.exists'=> 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=> 'A fornecedor informado não existe'
        ];

        $request->validate($regras,$feedback);
    
        $request->all(); //payload
        $produto; //estado do objeto antes do upload

        $produto->update($request->all()); //edição

        return redirect()->route('produto.show', ['produto'=> $produto->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
