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
            <div class="h5">Modelos</div>
            <div>
                <a href="{{ route('modelos.create') }}" class="btn btn-primary">Cadastrar</a>
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
                        <td>Montadora</td>
                    </tr>

                    @if ($modelos->isNotEmpty())
                        @foreach ($modelos as $modelo)
                            <tr valign="middle">
                                <td>{{ $modelo->id }}</td>
                                <td>{{ $modelo->nome }}</td>
                                <td>{{ $modelo->montadora }}</td>
                                <td>
                                    <a href="{{ route('modelos.edit', $modelo->id) }}"
                                        class="btn btn-primary btn-sm">Editar</a>
                                    <a href="#" onclick="deletarModelo({{ $modelo->id }})"
                                        class="btn btn-danger btn-sm">Excluir</a>

                                    <form id="modelo-edit-action-{{ $modelo->id }}"
                                        action="{{ route('modelos.destroy', $modelo->id) }}" method="post">
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
            {!! $modelos->links() !!}
        </div>
    </div>
</body>

</html>

<script>
    function deletarModelo(id) {
        if (confirm("Tem certeza que deseja deletar?")) {
            document.getElementById('modelo-edit-action-'+id).submit();
        }
    }
</script>
