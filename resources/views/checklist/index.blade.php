@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Checklist</h1>
        <h2>
            @isset($curso)
            {{ $curso->nome }}
            @endisset
        </h2>
    </div>
    <form action="{{ action('ChecklistController@index') }}">
        <h4>{{ __('Filter') }}</h4>

        <div class="form-group">
            <label for="selectCurso" class="form-label">Curso</label>
            <select id="selectCurso" name="curso" class="form-control">
                <option value=""></option>
                @foreach($cursos as $c)
                @php
                $selected = (isset($curso) && $c->id === $curso->id ? 'selected' : '');
                @endphp

                <option value="{{ $c->id }}" {{ $selected }}>{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectAluno" class="form-label">Aluno</label>
            <select id="selectAluno" name="aluno" class="form-control">
                <option value=""></option>
                @foreach($alunos as $a)
                @php
                $selected = (isset($aluno) && $a->id === $aluno->id ? 'selected' : '');
                @endphp

                <option value="{{ $a->id }}" {{ $selected }}>{{ $a->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Filter') }}</button>
        </div>
    </form>
    @isset($curso)
    <form action="{{ action('ChecklistController@store') }}" method="POST">
        @csrf

        <input type="hidden" name="url" value="{{ $url }}" />

        <table id="table" class="table">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Empresa</th>
                    <th>Professor</th>
                    <th>Início</th>
                    <th>Término</th>
                    @foreach($curso->documentos as $documento)
                    <th>{{ $documento->nome }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @isset($estagios)
                @foreach($estagios as $estagio)
                <tr>
                    <td>{{ $estagio->aluno->nome }}</td>
                    <td>{{ $estagio->empresa->nome }}</td>
                    <td>{{ $estagio->professor->nome }}</td>
                    <td>{{ $estagio->data_inicio }}</td>
                    <td>{{ $estagio->data_termino }}</td>
                    <td style="display: none;">
                        <input type="hidden" name="estagios[]" value="{{ $estagio->id }}" />
                    </td>
                    @foreach($curso->documentos as $documento)
                    @php
                    $checked = ($estagio->curso_documento->contains('documento_id', '=', $documento->id) ? 'checked' : '');
                    @endphp

                    <td>
                        <input type="checkbox"
                               name="entregue[{{ $estagio->id }}][{{ $documento->id }}]"
                               class="form-control"
                               {{ $checked }} />
                    </td>
                    @endforeach
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
    @endisset
</div>
@endsection
