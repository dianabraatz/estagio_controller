@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-4">
        <h1>{{ $aluno->nome }}</h1>
    </div>

    <p>
        ID: {{ $aluno->id }}
    </p>

    <p>
        Nome: {{ $aluno->nome }}
    </p>

    <p>
        Matrícula: {{ $aluno->matricula }}
    </p>

    <p>
        Curso:
        <a href="{{ action('CursoController@show', ['id' => $aluno->curso->id]) }}">
            {{ $aluno->curso->nome }}
        </a>
    </p>

    <p>
        {{ __('Created at') }}: {{ $aluno->created_at }}
    </p>

    <p>
        {{ __('Updated at') }}: {{ $aluno->updated_at }}
    </p>

    <p>
        Estágios:
        <ul class="list-group">
            @foreach($aluno->estagios as $estagio)
            <li class="list-group-item">
                <a href="{{ action('EstagioController@show', ['id' => $estagio->id]) }}">
                    {{ $estagio->display() }}
                </a>
            </li>
            @endforeach
        </ul>
    </p>

    <hr />

    <p>
        <a href="{{ action('AlunoController@index') }}">{{ __('Back to index') }}</a> |

        <a href="{{ action('AlunoController@edit', ['id' => $aluno->id]) }}">{{ __('Edit') }}</a> |

        <a href="{{ action('AlunoController@destroy', ['id' => $aluno->id]) }}"
           id="deleteLink"
           data-toggle="modal"
           data-target="#modal"
        >
            {{ __('Delete') }}
        </a>
    </p>

    @component('components.deleteform', [
        'id' => 'deleteForm',
        'action' => action('AlunoController@destroy', ['id' => $aluno->id])
    ])
    <h1 class="text-danger">Something went wrong</h1>
    @endcomponent
</div>

@component('components.confirmation', ['okButtonForm' => 'deleteForm'])
<h1 class="text-danger">Something went wrong</h1>
@endcomponent
@endsection
