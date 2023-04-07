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
                <a href="{{ route('locadoras.create') }}" class="btn btn-primary">Cadastrar</a>
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
                        <td>fantasia</td>
                        <td>razão social</td>
                        <td>CNPJ</td>
                        <td>email</td>
                        <td>endereço</td>
                        <td>Ações</td>
                    </tr>

                    @if ($locadoras->isNotEmpty())
                        @foreach ($locadoras as $locadora)
                            <tr valign="middle">
                                <td>{{ $locadora->id }}</td>
                                <td>{{ $locadora->fantasia }}</td>
                                <td>{{ $locadora->razao_social }}</td>
                                <td>{{ $locadora->cnpj }}</td>
                                <td>{{ $locadora->email }}</td>
                                <td>{{ $locadora->endereco }}</td>
                                <td>
                                    <a href="{{ route('locadoras.edit', $locadora->id) }}"
                                        class="btn btn-primary btn-sm">Editar</a>
                                    <a href="#" onclick="deletarLocadora({{ $locadora->id }})"
                                        class="btn btn-danger btn-sm">Excluir</a>

                                    <form id="locadora-edit-action-{{ $locadora->id }}"
                                        action="{{ route('locadoras.destroy', $locadora->id) }}" method="post">
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
            {!! $locadoras->links() !!}
        </div>
    </div>
</body>

</html>

<script>
    function deletarLocadora(id) {
        if (confirm("Tem certeza que deseja deletar?")) {
            document.getElementById('locadora-edit-action-'+id).submit();
        }
    }
</script>
