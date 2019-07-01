@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Edit :0', ['Estágio']) }}</h1>
    </div>
    <form action="{{ action('EstagioController@update', ['id' => $estagio->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="inputDataInicio">Data de início</label>
            <input id="inputDataInicio" type="date" name="data_inicio" class="form-control" value="{{ $estagio->data_inicio }}" />
        </div>

        <div class="form-group">
            <label for="inputDataTermino">Data de término</label>
            <input id="inputDataTermino" type="date" name="data_termino" class="form-control" value="{{ $estagio->data_termino }}" />
        </div>

        <div class="form-group">
            <label for="selectAluno">Aluno</label>
            <select name="aluno_id"
                    id="selectAluno"
                    class="form-control">
                @foreach($alunos as $aluno)
                @php
                $selected = $estagio->aluno->id === $aluno->id ? 'selected' : '';
                @endphp

                <option value="{{ $aluno->id }}" {{ $selected }}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectEmpresa">Empresa</label>
            <select name="empresa_id"
                    id="selectEmpresa"
                    class="form-control">
                @foreach($empresas as $empresa)
                @php
                $selected = $estagio->empresa->id === $empresa->id ? 'selected' : '';
                @endphp

                <option value="{{ $empresa->id }}" {{ $selected }}>{{ $empresa->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectProfessor">Professor</label>
            <select name="professor_id"
                    id="selectProfessor"
                    class="form-control">
                @foreach($professores as $professor)
                @php
                $selected = $estagio->professor->id === $professor->id ? 'selected' : '';
                @endphp

                <option value="{{ $professor->id }}" {{ $selected }}>{{ $professor->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    <hr>

    <p>
        <a href="{{ action('EstagioController@index') }}">{{ __('Back to index') }}</a>
    </p>
</div>
@endsection
