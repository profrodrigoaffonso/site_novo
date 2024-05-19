@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>
<form method="post" action="{{ route('admin.clientes.update') }}" autocomplete="off">
    @csrf
    @method('PUT')
    @component('components.forms.hidden', [
        'id'        => 'uuid',
        'name'      => 'uuid',
        'value'     => $cliente->uuid,
    ])
    @endcomponent
    <div class="row">
        <div class="col-8">
            @component('components.forms.input', [
                'id'        => 'nome',
                'name'      => 'nome',
                'label'     => 'Nome',
                'type'      => 'text',
                'value'     => $cliente->nome,
                'maxlength' => 100
            ])
            @endcomponent
        </div>
        <div class="col-4">
            @component('components.forms.input', [
                'id'        => 'cep',
                'name'      => 'cep',
                'label'     => 'CEP',
                'type'      => 'text',
                'value'     => $cliente->cep,
                'maxlength' => 9,
                'extra'     => 'onblur=consultaCep()'
            ])
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            @component('components.forms.input', [
                'id'        => 'endereco',
                'name'      => 'endereco',
                'label'     => 'Endereço',
                'type'      => 'text',
                'value'     => $cliente->endereco,
                'maxlength' => 200
            ])
            @endcomponent
        </div>
        <div class="col-3">
            @component('components.forms.input', [
                'id'        => 'numero',
                'name'      => 'numero',
                'label'     => 'Número',
                'type'      => 'text',
                'value'     => $cliente->numero,
                'maxlength' => 20
            ])
            @endcomponent
        </div>
        <div class="col-3">
            @component('components.forms.input', [
                'id'        => 'complemento',
                'name'      => 'complemento',
                'label'     => 'Complemento',
                'type'      => 'text',
                'value'     => $cliente->complemento,
                'maxlength' => 20
            ])
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            @component('components.forms.input', [
                'id'        => 'bairro',
                'name'      => 'bairro',
                'label'     => 'Bairro',
                'type'      => 'text',
                'value'     => $cliente->bairro,
                'maxlength' => 200
            ])
            @endcomponent
        </div>
        <div class="col-5">
            @component('components.forms.input', [
                'id'        => 'cidade',
                'name'      => 'cidade',
                'label'     => 'Cidade',
                'type'      => 'text',
                'value'     => $cliente->cidade,
                'maxlength' => 200
            ])
            @endcomponent
        </div>
        <div class="col-2">
            @component('components.forms.input', [
                'id'        => 'uf',
                'name'      => 'uf',
                'label'     => 'UF',
                'type'      => 'text',
                'value'     => $cliente->uf,
                'maxlength' => 2
            ])
            @endcomponent
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<script>

    var cep = document.getElementById('cep');
    cep.addEventListener('input', function (e) {
        var valor = e.target.value;
        valor = valor.replace(/\D/g, ''); // remove tudo que não é número
        valor = valor.replace(/^(\d{5})(\d)/g, '$1-$2'); // adiciona hífen após os primeiros cinco números
        e.target.value = valor;
    });

    function consultaCep(){

        cep = document.getElementById('cep').value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // código a ser executado em caso de sucesso
                var responseObj = JSON.parse(this.responseText)
                console.log(responseObj)
                document.getElementById('endereco').value = responseObj[0]
                document.getElementById('bairro').value = responseObj[1]
                document.getElementById('cidade').value = responseObj[2]
                document.getElementById('uf').value = responseObj[4]
            } else if (this.readyState == 4 && this.status != 200) {
                // código a ser executado em caso de erro
            }
        };
        xhttp.open("POST", "/api/cep", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cep=" + cep);


    }


</script>
@endsection
