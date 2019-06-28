@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-4">
        <h1>{{ $professor->nome }}</h1>
    </div>

    <p>
        ID: {{ $professor->id }}
    </p>

    <p>
        Nome: {{ $professor->nome }}
    </p>

    <p>
        {{ __('Created at') }}: {{ $professor->created_at }}
    </p>

    <p>
        {{ __('Updated at') }}: {{ $professor->updated_at }}
    </p>

    <hr />

    <p>
        <a href="{{ action('ProfessorController@index') }}">{{ __('Back to index') }}</a> |

        <a href="{{ action('ProfessorController@edit', ['id' => $professor->id]) }}">{{ __('Edit') }}</a> |

        <a href="{{ action('ProfessorController@destroy', ['id' => $professor->id]) }}"
           id="deleteLink"
           data-toggle="modal"
           data-target="#modal"
        >
            {{ __('Delete') }}
        </a>
    </p>

    @component('components.deleteform', [
        'id' => 'deleteForm',
        'action' => action('ProfessorController@destroy', ['id' => $professor->id])
    ])
    <h1 class="text-danger">Something went wrong</h1>
    @endcomponent
</div>

@component('components.confirmation', ['okButtonForm' => 'deleteForm'])
<h1 class="text-danger">Something went wrong</h1>
@endcomponent
@endsection
