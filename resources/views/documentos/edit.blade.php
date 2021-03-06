@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Edit :0', ['Documento']) }}</h1>
    </div>
    <form action="{{ action('DocumentoController@update', ['id' => $documento->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" id="inputNome" class="form-control" value="{{ $documento->nome }}" />
        </div>

        <div class="form-group">
            <label for="inputDescricao">Descrição</label>
            <textarea type="text" name="descricao" id="inputDescricao" class="form-control">{{ $documento->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="selectCursos">Cursos</label>
            <select multiple
                    id="selectCursos"
                    name="cursos[]"
                    class="form-control">
                @foreach($cursos as $curso)
                @php
                $selected = $documento->cursos->contains($curso) ? 'selected' : '';
                @endphp

                <option value="{{ $curso->id }}" {{ $selected }}>{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    <hr>

    <p>
        <a href="{{ action('DocumentoController@index') }}">{{ __('Back to index') }}</a>
    </p>
</div>
@endsection
