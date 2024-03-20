<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shopping\LoginRequest;
use App\Http\Requests\ShoppingRequest;
use App\Models\LojaModel;
use App\Models\ShoppingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index()
    {
        return view('login');
    }

    //Redireciona para a pagina de editar os dados com as informações atuais do banco nos inputs
    public function editDados()
    {
        $response = ShoppingModel::first();

        // Passa os dados carregados para a view
        return view('dadosShopping', [
            'cnpj' => $response->cnpj,
            'nome' => $response->nome,
            'razao_social' => $response->razao_social,
            'endereco' => $response->endereco,
            'fotos' => $response->fotos,
            'senha' => $response->senha
        ]);
    }
    
    //Valida o login
    public function valida(LoginRequest $request)
    {
        // Realizar a validação
        $validated = $request->validated();

        $shopping = ShoppingModel::first();

        // Verificar se a validação falha
        if (!$validated) {
            return redirect()->back()->withErrors('Credenciais inválidas.');
        }else{
            $lojas = LojaModel::all();
            return view('home', compact('lojas'))->with([
                'perfil'=>$shopping->fotos,
                'endereco'=>$shopping->endereco,
            ]);
        }

    
    }

    public function edit(ShoppingRequest $request)
    {
        // Recupera o primeiro item do banco de dados
        $shoppingModel = ShoppingModel::first();
    
        if ($shoppingModel) {
            // Atualiza os atributos com os valores do request
            $shoppingModel->cnpj = $request->input('cnpj');
            $shoppingModel->nome = $request->input('nome');
            $shoppingModel->razao_social = $request->input('razao_social');
            $shoppingModel->endereco = $request->input('endereco');
            $shoppingModel->fotos = $request->input('foto');
            $shoppingModel->senha = $request->input('senha');
    
            // Salva as alterações no banco de dados
            $shoppingModel->save();
    
            return redirect()->route('home')->with('success', 'Dados editados com sucesso!');
        } else {
            // Caso o item não exista, redireciona com uma mensagem de erro
            return redirect()->route('home')->with('error', 'Nenhum item encontrado para edição.');
        }
    }

}
