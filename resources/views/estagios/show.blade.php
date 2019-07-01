@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-4">
        <h1>{{ $estagio->display() }}</h1>
    </div>

    <p>
        ID: {{ $estagio->id }}
    </p>

    <p>
        Data de início: {{ $estagio->data_inicio }}
    </p>

    <p>
        Data de término: {{ $estagio->data_termino }}
    </p>

    <p>
        Aluno:
        <a href="{{ action('AlunoController@show', ['id' => $estagio->aluno->id]) }}">
            {{ $estagio->aluno->nome }}
        </a>
    </p>

    <p>
        Empresa:
        <a href="{{ action('EmpresaController@show', ['id' => $estagio->empresa->id]) }}">
            {{ $estagio->empresa->nome }}
        </a>
    </p>

    <p>
        Professor:
        <a href="{{ action('ProfessorController@show', ['id' => $estagio->professor->id]) }}">
            {{ $estagio->professor->nome }}
        </a>
    </p>

    <p>
        {{ __('Created at') }}: {{ $estagio->created_at }}
    </p>

    <p>
        {{ __('Updated at') }}: {{ $estagio->updated_at }}
    </p>

    <hr />

    <p>
        <a href="{{ action('EstagioController@index') }}">{{ __('Back to index') }}</a> |

        <a href="{{ action('EstagioController@edit', ['id' => $estagio->id]) }}">{{ __('Edit') }}</a> |

        <a href="{{ action('EstagioController@destroy', ['id' => $estagio->id]) }}"
           id="deleteLink"
           data-toggle="modal"
           data-target="#modal"
        >
            {{ __('Delete') }}
        </a>
    </p>

    @component('components.deleteform', [
        'id' => 'deleteForm',
        'action' => action('EstagioController@destroy', ['id' => $estagio->id])
    ])
    <h1 class="text-danger">Something went wrong</h1>
    @endcomponent
</div>

@component('components.confirmation', ['okButtonForm' => 'deleteForm'])
<h1 class="text-danger">Something went wrong</h1>
@endcomponent
@endsection
