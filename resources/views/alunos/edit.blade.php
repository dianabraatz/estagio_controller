@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Edit :0', ['Aluno']) }}</h1>
    </div>
    <form action="{{ action('AlunoController@update', ['id' => $aluno->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" id="inputNome" class="form-control" value="{{ $aluno->nome }}" />
        </div>

        <div class="form-group">
            <label for="inputMatricula">Matrícula</label>
            <input type="text" name="matricula" id="inputMatricula" class="form-control" value="{{ $aluno->matricula }}" />
        </div>

        <div class="form-group">
            <label for="selectCurso">Curso</label>
            <select id="selectCurso" name="curso_id" class="form-control">
                @foreach($cursos as $curso)
                @php
                $selected = ($curso->id === $aluno->curso_id ? 'selected' : '');
                @endphp

                <option value="{{ $curso->id }}" {{ $selected }}>
                    {{ $curso->nome }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    <hr>

    <p>
        <a href="{{ action('AlunoController@index') }}">{{ __('Back to index') }}</a>
    </p>
</div>
@endsection
