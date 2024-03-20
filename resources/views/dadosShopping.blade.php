@extends('base')

@section('titulo', 'Dados shopping')

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
            <img src="{{ $fotos }}" alt="Foto do shopping" style="width: 100%; height:100%; object-fit: cover;">
        </div>
    </header>

    <h3 style="margin-top: 100px; margin-bottom: 100px; text-align:center; color: #0d6efd">Editar dados do Shopping</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5 cadastroForm" action="{{ route('edit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $cnpj }}">

            @if ($errors->has('cnpj'))
                @foreach ($errors->get('cnpj') as $erro)
                    <div class="text-danger">{{ $erro }}</div>
                @endforeach
            @endif
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">NOME</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $nome }}">

            @if ($errors->has('nome'))
                @foreach ($errors->get('nome') as $erro)
                    <div class="text-danger">{{ $erro }}</div>
                @endforeach
            @endif

        </div>

        <div class="mb-3">
            <label for="razao_social" class="form-label">RAZÃO SOCIAL</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{ $razao_social }}">

            @if ($errors->has('razao_social'))
                @foreach ($errors->get('razao_social') as $erro)
                    <div class="text-danger">{{ $erro }}</div>
                @endforeach
            @endif

        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">ENDEREÇO</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $endereco }}">

            @if ($errors->has('endereco'))
                @foreach ($errors->get('endereco') as $erro)
                    <div class="text-danger">{{ $erro }}</div>
                @endforeach
            @endif

        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto de perfil</label>
            <input type="text" class="form-control" id="foto" name="foto" value="{{ $fotos }}">

            @if ($errors->has('cep'))
                @foreach ($errors->get('cep') as $erro)
                    <div class="text-danger">{{ $erro }}</div>
                @endforeach
            @endif

        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">SENHA</label>
            <input type="password" class="form-control" id="senha" name="senha" value="{{ $senha }}">

            @if ($errors->has('cep'))
                @foreach ($errors->get('cep') as $erro)
                    <div class="text-danger">{{ $erro }}</div>
                @endforeach
            @endif
        </div>

        <button type="submit" class="btn btn-primary">SALVAR</button>
    </form>
@endsection
