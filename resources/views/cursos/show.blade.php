@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-4">
        <h1>{{ $curso->nome }}</h1>
    </div>

    <p>
        ID: {{ $curso->id }}
    </p>

    <p>
        Nome: {{ $curso->nome }}
    </p>

    <p>
        {{ __('Created at') }}: {{ $curso->created_at }}
    </p>

    <p>
        {{ __('Updated at') }}: {{ $curso->updated_at }}
    </p>

    <p>
        {{ __('Documentos') }}:
        <ul class="list-group">
            @foreach($curso->documentos as $documento)
            <li class="list-group-item">
                <a href="{{ action('DocumentoController@show', ['id' => $documento->id]) }}">
                    {{ $documento->nome }}
                </a>
            </li>
            @endforeach
        </ul>
    </p>

    <hr />

    <p>
        <a href="{{ action('CursoController@index') }}">{{ __('Back to index') }}</a> |

        <a href="{{ action('CursoController@edit', ['id' => $curso->id]) }}">{{ __('Edit') }}</a> |

        <a href="{{ action('CursoController@destroy', ['id' => $curso->id]) }}"
           id="deleteLink"
           data-toggle="modal"
           data-target="#modal"
        >
            {{ __('Delete') }}
        </a>
    </p>

    @component('components.deleteform', [
        'id' => 'deleteForm',
        'action' => action('CursoController@destroy', ['id' => $curso->id])
    ])
    <h1 class="text-danger">Something went wrong</h1>
    @endcomponent
</div>

@component('components.confirmation', ['okButtonForm' => 'deleteForm'])
<h1 class="text-danger">Something went wrong</h1>
@endcomponent
@endsection
