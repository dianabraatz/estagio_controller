@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Create :0', ['Empresa']) }}</h1>
    </div>
    <form action="{{ action('EmpresaController@store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input id="inputNome" type="text" name="nome" class="form-control" />
        </div>

        <div class="form-group">
            <label for="inputRazaoSocial">Razão Social</label>
            <input id="inputRazaoSocial" type="text" name="razao_social" class="form-control" />
        </div>

        <div class="form-group">
            <label for="inputCnpj">CNPJ</label>
            <input id="inputCnpj" type="text" name="cnpj" class="form-control" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection
