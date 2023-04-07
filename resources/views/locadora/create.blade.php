<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
</head>

<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Crud</div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h5">Locadoras</div>
            <div>
                <a href="{{ route('locadoras.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>

        <form action="{{ route('locadoras.store') }}" method="post">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="fantasia" class="form-label">Nome fantasia</label>
                        <input type="text" name="fantasia" id="fantasia" placeholder="Digite o nome fantasia"
                            class="form-control
                        @error('fantasia') is-invalid @enderror" value="{{ old('fantasia') }}">

                        @error('fantasia')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="razao_social" class="form-label">Razão social</label>
                        <input type="text" name="razao_social" id="razao_social" placeholder="Digite a razão social"
                            class="form-control
                        @error('razao_social') is-invalid @enderror" value="{{ old('razao_social') }}">

                        @error('razao_social')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" placeholder="Digite o CNPJ"
                            class="form-control
                        @error('cnpj') is-invalid @enderror" value="{{ old('cnpj') }}">

                        @error('cnpj')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Digite o email"
                            class="form-control
                        @error('email') is-invalid @enderror" value="{{ old('email') }}">

                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço"
                            class="form-control
                        @error('email') is-invalid @enderror" value="{{ old('endereco') }}">

                        @error('endereco')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Cadastrar locadora</button>
        </form>
    </div>
</body>

</html>
