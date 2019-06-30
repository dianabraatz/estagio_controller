@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Create :0', ['Curso']) }}</h1>
    </div>
    <form action="{{ action('CursoController@store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input id="inputNome" type="text" name="nome" class="form-control" />
        </div>

        <div class="form-group">
            <label for="selectDocumentos">Documentos</label>
            <select multiple
                    name="documentos[]"
                    id="selectDocumentos"
                    class="form-control">
                @foreach($documentos as $documento)
                <option value="{{ $documento->id }}">{{ $documento->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection
