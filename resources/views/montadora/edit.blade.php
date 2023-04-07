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
            <div class="h5">Editar Montadora</div>
            <div>
                <a href="{{ route('montadoras.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>

        <form action="{{ route('montadoras.update', $montadora->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome da montadora</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite o nome da montadora"
                            class="form-control
                        @error('nome') is-invalid @enderror" value="{{ old('nome', $montadora->nome) }}">

                        @error('nome')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Atualizar montadora</button>
        </form>
    </div>
</body>

</html>
