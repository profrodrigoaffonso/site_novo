@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>
<a href="{{ route('admin.clientes.create') }}" class="btn btn-primary">Novo</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>UF</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome  }}</td>
                <td>{{ $cliente->cidade  }}</td>
                <td>{{ $cliente->uf  }}</td>
                <td><a href="{{ route('admin.clientes.edit', $cliente->uuid) }}" class="btn btn-primary">Editar</a></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>

@endsection
