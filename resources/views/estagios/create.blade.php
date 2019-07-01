@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Create :0', ['Estágio']) }}</h1>
    </div>
    <form action="{{ action('EstagioController@store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputDataInicio">Data de início</label>
            <input id="inputDataInicio" type="date" name="data_inicio" class="form-control" />
        </div>

        <div class="form-group">
            <label for="inputDataTermino">Data de término</label>
            <input id="inputDataTermino" type="date" name="data_termino" class="form-control" />
        </div>

        <div class="form-group">
            <label for="selectAluno">Aluno</label>
            <select name="aluno_id"
                    id="selectAluno"
                    class="form-control">
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectEmpresa">Empresa</label>
            <select name="empresa_id"
                    id="selectEmpresa"
                    class="form-control">
                @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectProfessor">Professor</label>
            <select name="professor_id"
                    id="selectProfessor"
                    class="form-control">
                @foreach($professores as $professor)
                <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection
