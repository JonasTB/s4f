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
            <div class="h5">Veículos</div>
            <div>
                <a href="{{ route('veiculos.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>

        <form action="{{ route('veiculos.store') }}" method="post">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="portas" class="form-label">Portas</label>
                        <input type="text" name="portas" id="portas" placeholder="Digite a quantidade de portas"
                            class="form-control
                        @error('portas') is-invalid @enderror" value="{{ old('portas') }}">

                        @error('portas')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" id="modelo" placeholder="Digite o modelo"
                            class="form-control
                        @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}">

                        @error('modelo')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cor" class="form-label">Cor</label>
                        <input type="text" name="cor" id="cor" placeholder="Digite a cor"
                            class="form-control
                        @error('cor') is-invalid @enderror" value="{{ old('cor') }}">

                        @error('cor')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fabricante" class="form-label">Fabricante</label>
                        <input type="text" name="fabricante" id="fabricante" placeholder="Digite a frabicante"
                            class="form-control
                        @error('fabricante') is-invalid @enderror" value="{{ old('fabricante') }}">

                        @error('fabricante')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ano_fabricacao" class="form-label">Ano de fabricação</label>
                        <input type="text" name="ano_fabricacao" id="ano_fabricacao" placeholder="Digite o ano da fabricação"
                            class="form-control
                        @error('ano_fabricacao') is-invalid @enderror" value="{{ old('ano_fabricacao') }}">

                        @error('ano_fabricacao')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" id="placa" placeholder="Digite a placa"
                            class="form-control
                        @error('placa') is-invalid @enderror" value="{{ old('placa') }}">

                        @error('placa')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="chassi" class="form-label">Chassi</label>
                        <input type="text" name="chassi" id="chassi" placeholder="Digite o chassi"
                            class="form-control
                        @error('chassi') is-invalid @enderror" value="{{ old('chassi') }}">

                        @error('chassi')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="data_criacao" class="form-label">Data de criação</label>
                        <input type="text" name="data_criacao" id="data_criacao" placeholder="Digite a data de criação"
                            class="form-control
                        @error('data_criacao') is-invalid @enderror" value="{{ old('data_criacao') }}">

                        @error('data_criacao')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Cadastrar veículo</button>
        </form>
    </div>
</body>

</html>
