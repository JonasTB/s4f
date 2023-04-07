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
                <a href="{{ route('veiculos.create') }}" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                    </tr>

                    @if ($veiculos->isNotEmpty())
                        @foreach ($veiculos as $veiculo)
                            <tr valign="middle">
                                <td>{{ $veiculo->id }}</td>
                                <td>{{ $veiculo->portas }}</td>
                                <td>{{ $veiculo->modelo }}</td>
                                <td>{{ $veiculo->cor }}</td>
                                <td>{{ $veiculo->fabricante }}</td>
                                <td>{{ $veiculo->ano_fabricacao }}</td>
                                <td>{{ $veiculo->placa }}</td>
                                <td>{{ $veiculo->chassi }}</td>
                                <td>{{ $veiculo->data_criacao }}</td>
                                <td>
                                    <a href="{{ route('veiculos.edit', $veiculo->id) }}"
                                        class="btn btn-primary btn-sm">Editar</a>
                                    <a href="#" onclick="deletarVeiculo({{ $veiculo->id }})"
                                        class="btn btn-danger btn-sm">Excluir</a>

                                    <form id="veiculo-edit-action-{{ $veiculo->id }}"
                                        action="{{ route('veiculos.destroy', $veiculo->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Lista vazia!</td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! $veiculos->links() !!}
        </div>
    </div>
</body>

</html>

<script>
    function deletarVeiculo(id) {
        if (confirm("Tem certeza que deseja deletar?")) {
            document.getElementById('veiculo-edit-action-'+id).submit();
        }
    }
</script>
