@extends('base')

@section('titulo', 'Cadastro')

@section('content')
    <header class="d-flex justify-content-around align-items-center mb-3 bg-light fixed-top"
        style="background-color: white; border-radius:30px;">
        <a href="{{ route('home') }}">
            <h3>SHOPPING-FLUX</h3>
        </a>
        <a href="{{ route('editarDados') }}" class="btn btn-outline-primary mt-4 mb-4" style="height: 4vh">Editar Cadastro do
            Shopping</a>
        <a href="{{ route('cadastro') }}" class="btn btn-outline-success mt-4 mb-4" style="height: 4vh">Nova loja</a>
        <div class="perfil" style="border-radius: 50%; overflow: hidden; width: 50px; height: 50px;">
    </header>

    <h3 style="margin-top: 100px; margin-bottom: 100px; text-align:center; color: #0d6efd">Cadastre uma nova loja</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5 cadastroForm" action="{{ route('salvar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj">
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">NOME</label>
            <input type="text" class="form-control" id="nome" name="nome" value="">
        </div>

        <div class="mb-3">
            <label for="razao_social" class="form-label">RAZÃO SOCIAL</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" value="">
        </div>

        <div class="mb-3">
            <label for="responsavel" class="form-label">RESPONSÁVEL</label>
            <input type="text" class="form-control" id="responsavel" name="responsavel" value="">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">NUMERO DE TELEFONE</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="">
        </div>

        <div class="mb-3">
            <label for="informacao" class="form-label">INFORMAÇÃO EXTRA</label>
            <input type="text" class="form-control" id="informacao" name="informacao" value="">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">URL FOTO</label>
            <input type="text" class="form-control" id="foto" name="foto" value="">
        </div>

        <div class="mb-3">
            <label for="classificacao_id" class="form-label">CLASSIFICAÇÃO</label>
            <select class="form-control" id="classificacao_id" name="classificacao_id">
                <option value="1">Roupas</option>
                <option value="2">Sapatos</option>
                <option value="3">Comidas</option>
                <option value="4">Restaurante</option>
                <option value="5">Eletronicos</option>
                <option value="6">Joias</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
