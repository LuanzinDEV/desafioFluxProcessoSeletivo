@extends('base')

@section('titulo', 'Home')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" style="margin-top: 100px">
            {{ session('success') }}
        </div>
    @endif

    <header class="d-flex justify-content-around align-items-center mb-3 bg-light fixed-top"
        style="background-color: white;">
        <a href="#">
            <h3>SHOPPING-FLUX</h3>
        </a>
        <a href="{{ route('editarDados') }}" class="btn btn-outline-primary mt-4 mb-4" style="height: 4vh">Editar Cadastro do
            Shopping</a>
        <a href="{{ route('cadastro') }}" class="btn btn-outline-success mt-4 mb-4" style="height: 4vh">Nova loja</a>
        <div class="perfil" style="border-radius: 50%; overflow: hidden; width: 50px; height: 50px;">
            <img src="{{ $perfil }}" alt="Foto do shopping" style="width: 100%; height:100%; object-fit: cover;">
        </div>
    </header>

    <h3 style="margin-top: 100px; margin-bottom: 100px; text-align:center; color: #0d6efd">Lista das lojas do SHOPPING</h3>

    <section id="menu" class="container mt-5 mb-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="todas-tab" data-bs-toggle="tab" data-bs-target="#todas-tab-pane"
                    type="button" role="tab" aria-controls="todas-tab-pane" aria-selected="true">Todas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="roupas-tab" data-bs-toggle="tab" data-bs-target="#roupas-tab-pane"
                    type="button" role="tab" aria-controls="roupas-tab-pane" aria-selected="false">Roupas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sapatos-tab" data-bs-toggle="tab" data-bs-target="#sapatos-tab-pane"
                    type="button" role="tab" aria-controls="sapatos-tab-pane" aria-selected="false">Sapatos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="comidas-tab" data-bs-toggle="tab" data-bs-target="#comidas-tab-pane"
                    type="button" role="tab" aria-controls="comidas-tab-pane" aria-selected="false">Comidas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="restaurantes-tab" data-bs-toggle="tab" data-bs-target="#restaurantes-tab-pane"
                    type="button" role="tab" aria-controls="restaurantes-tab-pane"
                    aria-selected="false">Restaurantes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="eletronicos-tab" data-bs-toggle="tab" data-bs-target="#eletronicos-tab-pane"
                    type="button" role="tab" aria-controls="eletronicos-tab-pane"
                    aria-selected="false">Eletronicos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="joias-tab" data-bs-toggle="tab" data-bs-target="#joias-tab-pane" type="button"
                    role="tab" aria-controls="joias-tab-pane" aria-selected="false">Joias</button>
            </li>

        </ul>
        <div class="tab-content" id="StoreTabContent">
            <div class="tab-pane fade" id="todas-tab-pane" role="tabpanel" aria-labelledby="todas-tab" tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ $loja->foto }}" class="card-img-top" alt="Imagem da loja">
                                <div class="card-body">
                                    <h5 class="card-title">Loja: {{ $loja->nome }}</h5>
                                    <p class="card-text">
                                        <strong>CNPJ:</strong> {{ $loja->cnpj }}<br>
                                        <strong>Razão Social:</strong> {{ $loja->razao_social }}<br>
                                        <strong>Responsável:</strong> {{ $loja->responsavel }}<br>
                                        <strong>Telefone:</strong> {{ $loja->telefone }}<br>
                                        <strong>Informação adicional:</strong> {{ $loja->informacao }}<br>
                                        <strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="roupas-tab-pane" role="tabpanel" aria-labelledby="roupas-tab"
                tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        @if ($loja->classificacao->tipo == 'Roupas')
                            <div class="col-md-3 mb-4">
                                <div class="card card-menu">
                                    <img src="{{ $loja->foto }}" class="card-img-top" alt="..."
                                        style="width: 100%; height:200px">
                                    <div class="card-body">
                                        <h5>Loja: {{ $loja->nome }}</h5>
                                        <p class="mb-1"><strong>CNPJ:</strong> {{ $loja->cnpj }}</p>
                                        <p class="mb-1"><strong>Razão Social:</strong> {{ $loja->razao_social }}</p>
                                        <p class="mb-1"><strong>Responsavel:</strong> {{ $loja->responsavel }}</p>
                                        <p class="mb-1"><strong>Telefone:</strong> {{ $loja->Telefone }}</p>
                                        <p class="mb-1"><strong>Informação adicional:</strong> {{ $loja->informacao }}
                                        </p>
                                        <p class="mb-1"><strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="sapatos-tab-pane" role="tabpanel" aria-labelledby="sapatos-tab"
                tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        @if ($loja->classificacao->tipo == 'Sapatos')
                            <div class="col-md-3 mb-4">
                                <div class="card card-menu">
                                    <img src="{{ $loja->foto }}" class="card-img-top" alt="..."
                                        style="width: 100%; height:200px">
                                    <div class="card-body">
                                        <h5>Loja: {{ $loja->nome }}</h5>
                                        <p class="mb-1"><strong>CNPJ:</strong> {{ $loja->cnpj }}</p>
                                        <p class="mb-1"><strong>Razão Social:</strong> {{ $loja->razao_social }}</p>
                                        <p class="mb-1"><strong>Responsavel:</strong> {{ $loja->responsavel }}</p>
                                        <p class="mb-1"><strong>Telefone:</strong> {{ $loja->Telefone }}</p>
                                        <p class="mb-1"><strong>Informação adicional:</strong> {{ $loja->informacao }}
                                        </p>
                                        <p class="mb-1"><strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="comidas-tab-pane" role="tabpanel" aria-labelledby="comidas-tab"
                tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        @if ($loja->classificacao->tipo == 'Comidas')
                            <div class="col-md-3 mb-4">
                                <div class="card card-menu">
                                    <img src="{{ $loja->foto }}" class="card-img-top" alt="..."
                                        style="width: 100%; height:200px">
                                    <div class="card-body">
                                        <h5>Loja: {{ $loja->nome }}</h5>
                                        <p class="mb-1"><strong>CNPJ:</strong> {{ $loja->cnpj }}</p>
                                        <p class="mb-1"><strong>Razão Social:</strong> {{ $loja->razao_social }}</p>
                                        <p class="mb-1"><strong>Responsavel:</strong> {{ $loja->responsavel }}</p>
                                        <p class="mb-1"><strong>Telefone:</strong> {{ $loja->Telefone }}</p>
                                        <p class="mb-1"><strong>Informação adicional:</strong> {{ $loja->informacao }}
                                        </p>
                                        <p class="mb-1"><strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="restaurantes-tab-pane" role="tabpanel" aria-labelledby="restaurantes-tab"
                tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        @if ($loja->classificacao->tipo == 'Restaurante')
                            <div class="col-md-3 mb-4">
                                <div class="card card-menu">
                                    <img src="{{ $loja->foto }}" class="card-img-top" alt="..."
                                        style="width: 100%; height:200px">
                                    <div class="card-body">
                                        <h5>Loja: {{ $loja->nome }}</h5>
                                        <p class="mb-1"><strong>CNPJ:</strong> {{ $loja->cnpj }}</p>
                                        <p class="mb-1"><strong>Razão Social:</strong> {{ $loja->razao_social }}</p>
                                        <p class="mb-1"><strong>Responsavel:</strong> {{ $loja->responsavel }}</p>
                                        <p class="mb-1"><strong>Telefone:</strong> {{ $loja->Telefone }}</p>
                                        <p class="mb-1"><strong>Informação adicional:</strong> {{ $loja->informacao }}
                                        </p>
                                        <p class="mb-1"><strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="eletronicos-tab-pane" role="tabpanel" aria-labelledby="eletronicos-tab"
                tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        @if ($loja->classificacao->tipo == 'Eletronico')
                            <div class="col-md-3 mb-4">
                                <div class="card card-menu">
                                    <img src="{{ $loja->foto }}" class="card-img-top" alt="..."
                                        style="width: 100%; height:200px">
                                    <div class="card-body">
                                        <h5>Loja: {{ $loja->nome }}</h5>
                                        <p class="mb-1"><strong>CNPJ:</strong> {{ $loja->cnpj }}</p>
                                        <p class="mb-1"><strong>Razão Social:</strong> {{ $loja->razao_social }}</p>
                                        <p class="mb-1"><strong>Responsavel:</strong> {{ $loja->responsavel }}</p>
                                        <p class="mb-1"><strong>Telefone:</strong> {{ $loja->Telefone }}</p>
                                        <p class="mb-1"><strong>Informação adicional:</strong> {{ $loja->informacao }}
                                        </p>
                                        <p class="mb-1"><strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="joias-tab-pane" role="tabpanel" aria-labelledby="joias-tab" tabindex="0">
                <div class="row mt-3">
                    @foreach ($lojas as $loja)
                        @if ($loja->classificacao->tipo == 'Joias')
                            <div class="col-md-3 mb-4">
                                <div class="card card-menu">
                                    <img src="{{ $loja->foto }}" class="card-img-top" alt="..."
                                        style="width: 100%; height:200px">
                                    <div class="card-body">
                                        <h5>Loja: {{ $loja->nome }}</h5>
                                        <p class="mb-1"><strong>CNPJ:</strong> {{ $loja->cnpj }}</p>
                                        <p class="mb-1"><strong>Razão Social:</strong> {{ $loja->razao_social }}</p>
                                        <p class="mb-1"><strong>Responsavel:</strong> {{ $loja->responsavel }}</p>
                                        <p class="mb-1"><strong>Telefone:</strong> {{ $loja->Telefone }}</p>
                                        <p class="mb-1"><strong>Informação adicional:</strong> {{ $loja->informacao }}
                                        </p>
                                        <p class="mb-1"><strong>Classificação:</strong> {{ $loja->classificacao->tipo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center bg-light p-5 mt-5 text-light">
        <div class="texto" style="display: flex; flex-direction: column;align-items:center; text-align:center; margin-left:50px; color:black">
            <p class="mt-2 mb-0 fw-bold" style="font-size:20px">
                FLUX
            </p>
            <p style="font-size:12px; width:150px">{{ $endereco }}</p>
        </div>
    </footer>
    @endsection
