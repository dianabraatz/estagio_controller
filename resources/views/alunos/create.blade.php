@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Create :0', ['Aluno']) }}</h1>
    </div>

    <form action="{{ action('AlunosController@store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input id="inputNome" type="text" name="nome" class="form-control" />
        </div>

        <div class="form-group">
            <label for="inputMatricula">Matrícula</label>
            <input id="inputMatricula" type="text" name="matricula" class="form-control" />
        </div>

        <div class="form-group">
            <label for="selectCurso">Curso</label>
            <select id="selectCurso" type="text" name="curso_id" class="form-control">
                @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection
