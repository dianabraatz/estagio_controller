@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Alunos</h1>
        <a href="{{ action('AlunosController@create') }}">{{ __('Create :0', ['Aluno']) }}</a>
    </div>
    <table id="table" class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Matrícula</td>
                <td>Curso</td>
                <td>{{ __('Actions') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->matricula }}</td>
                <td>
                    <a href="{{ action('CursosController@show', ['id' => $aluno->curso->id]) }}">
                        {{ $aluno->curso->nome }}
                    </a>
                </td>
                <td>
                    <a href="{{ action('AlunosController@show',    ['id' => $aluno->id]) }}">{{ __('View') }}</a> |

                    <a href="{{ action('AlunosController@edit',    ['id' => $aluno->id]) }}">{{ __('Edit') }}</a> |

                    <a href="{{ action('AlunosController@destroy', ['id' => $aluno->id]) }}"
                       data-deleteform="deleteForm{{ $aluno->id }}"
                       data-toggle="modal"
                       data-target="#modal"
                    >
                        {{ __('Delete') }}
                    </a>

                    @component('components.deleteform', [
                        'id' => 'deleteForm'.$aluno->id,
                        'action' => action('AlunosController@destroy', ['id' => $aluno->id])
                    ])
                    <h1 class="text-danger">Something went wrong</h1>
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $alunos->links() }}
</div>

@component('components.confirmation')
<h1 class="text-danger">Something went wrong</h1>
@endcomponent

<script src="{{ asset('js/setup-delete-links.js') }}"></script>
@endsection
