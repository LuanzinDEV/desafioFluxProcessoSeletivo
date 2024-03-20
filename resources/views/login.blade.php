<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <div class="login">
            <h1 class="login__title">LOGIN</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="login mt-2" action="{{ route('valida') }}" method="POST">
                @csrf
                <div>
                    <label for="CNPJ" class="login__label mt-4">CNPJ</label>
                    <input type="text" class="form-control login__field" id="cnpj" placeholder="CNPJ"
                        name="cnpj" required>
                </div>

                <div>
                    <label for="password" class="login__label mt-3">Senha</label>
                    <input type="password" class="form-control login__field" id="password" placeholder="Senha"
                        minlength="8" name="senha" required>
                </div>

                <div class="login__actions">
                    <button type="submit" class="btn btn-primary btn-block mt-3">Entrar</button>
                </div>
            </form>
        </div>


        <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    </div>
</body>

</html>
