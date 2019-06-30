@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-4">
        <h1>{{ $documento->nome }}</h1>
    </div>

    <p>
        ID: {{ $documento->id }}
    </p>

    <p>
        Nome: {{ $documento->nome }}
    </p>

    <p>
        Descrição: {{ $documento->descricao }}
    </p>

    <p>
        {{ __('Created at') }}: {{ $documento->created_at }}
    </p>

    <p>
        {{ __('Updated at') }}: {{ $documento->updated_at }}
    </p>

    <p>
        Cursos:
        <ul class="list-group">
            @foreach($documento->cursos as $curso)
            <li class="list-group-item">
                <a href="{{ action('CursoController@show', ['id' => $curso->id]) }}">
                    {{ $curso->nome }}
                </a>
            </li>
            @endforeach
        </ul>
    </p>

    <hr />

    <p>
        <a href="{{ action('DocumentoController@index') }}">{{ __('Back to index') }}</a> |

        <a href="{{ action('DocumentoController@edit', ['id' => $documento->id]) }}">{{ __('Edit') }}</a> |

        <a href="{{ action('DocumentoController@destroy', ['id' => $documento->id]) }}"
           id="deleteLink"
           data-toggle="modal"
           data-target="#modal"
        >
            {{ __('Delete') }}
        </a>
    </p>

    @component('components.deleteform', [
        'id' => 'deleteForm',
        'action' => action('DocumentoController@destroy', ['id' => $documento->id])
    ])
    <h1 class="text-danger">Something went wrong</h1>
    @endcomponent
</div>

@component('components.confirmation', ['okButtonForm' => 'deleteForm'])
<h1 class="text-danger">Something went wrong</h1>
@endcomponent
@endsection
