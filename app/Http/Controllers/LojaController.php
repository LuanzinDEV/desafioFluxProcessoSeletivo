<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loja\CadastroRequest;
use App\Models\LojaModel;
use App\Models\ShoppingModel;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    //direciona para a pagina principal
    public function home()
    {
        //feito somente para exibir a imagem de perfil
        $shopping = ShoppingModel::first();

        $lojas = LojaModel::all();
        return view('home', compact('lojas'))->with([
            'perfil'=>$shopping->fotos,
            'endereco'=>$shopping->endereco,
        ]);
    }

    //Vai para a view onde cadastra as lojas
    public function cadastro()
    {
        return view('cadastroLoja');
    }


    //Cria uma nova loja enviar o formulario
    public function create(CadastroRequest $request)
    {
        // Verifica se o CNPJ já está cadastrado no banco de dados
        $cnpjExistente = LojaModel::where('cnpj', $request->input('cnpj'))->first();

        if ($cnpjExistente)
        {
            // Se o CNPJ já estiver cadastrado, redireciona de volta para o formulário de cadastro com um erro
            return redirect()->route('cadastro')->withErrors(['cnpj' => 'CNPJ já cadastrado.'])->withInput();
        }else
        {
            // Se o CNPJ não estiver cadastrado, cria uma nova entrada na tabela 'loja'
            LojaModel::create([
                'cnpj' => $request->input('cnpj'),
                'nome' => $request->input('nome'),
                'razao_social' => $request->input('razao_social'),
                'responsavel' => $request->input('responsavel'),
                'telefone' => $request->input('telefone'),
                'informacao' => $request->input('informacao'),
                'foto' => $request->input('foto'),
                'classificacao_id' => $request->input('classificacao_id'),
            ]);
            // Redireciona de volta para a página inicial com uma mensagem de sucesso
            return redirect()->route('home')->with('success', 'Loja cadastrada com sucesso.');
        }
    }
    
}
