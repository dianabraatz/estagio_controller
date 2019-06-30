@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Create :0', ['Documento']) }}</h1>
    </div>
    <form action="{{ action('DocumentoController@store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input id="inputNome" type="text" name="nome" class="form-control" />
        </div>

        <div class="form-group">
            <label for="inputDescricao">Descricao</label>
            <textarea id="inputDescricao" type="text" name="descricao" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection
