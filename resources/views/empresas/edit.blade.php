@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Edit :0', ['Empresa']) }}</h1>
    </div>
    <form action="{{ action('EmpresaController@update', ['id' => $empresa->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" id="inputNome" class="form-control" value="{{ $empresa->nome }}" />
        </div>

        <div class="form-group">
            <label for="inputRazaoSocial">Razão Social</label>
            <input type="text" name="razao_social" id="inputRazaoSocial" class="form-control" value="{{ $empresa->razao_social }}" />
        </div>

        <div class="form-group">
            <label for="inputCnpj">CNPJ</label>
            <input type="text" name="cnpj" id="inputCnpj" class="form-control" value="{{ $empresa->cnpj }}" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    <hr>

    <p>
        <a href="{{ action('EmpresaController@index') }}">{{ __('Back to index') }}</a>
    </p>
</div>
@endsection
