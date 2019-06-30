@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Edit :0', ['Curso']) }}</h1>
    </div>
    <form action="{{ action('CursoController@update', ['id' => $curso->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" id="inputNome" class="form-control" value="{{ $curso->nome }}" />
        </div>

        <div class="form-group">
            <label for="selectDocumentos">Documentos</label>
            <select multiple
                    name="documentos[]"
                    id="selectDocumentos"
                    class="form-control">
                @foreach($documentos as $documento)
                @php
                $selected = $curso->documentos->contains($documento) ? 'selected' : '';
                @endphp

                <option value="{{ $documento->id }}" {{ $selected }}>{{ $documento->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    <hr>

    <p>
        <a href="{{ action('CursoController@index') }}">{{ __('Back to index') }}</a>
    </p>
</div>
@endsection
