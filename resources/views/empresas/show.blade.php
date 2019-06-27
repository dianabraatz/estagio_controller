@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-4">
        <h1>{{ $empresa->nome }}</h1>
    </div>

    <p>
        ID: {{ $empresa->id }}
    </p>

    <p>
        Nome: {{ $empresa->nome }}
    </p>

    <p>
        Razão Social: {{ $empresa->razao_social }}
    </p>

    <p>
        CNPJ: {{ $empresa->cnpj }}
    </p>

    <p>
        {{ __('Created at') }}: {{ $empresa->created_at }}
    </p>

    <p>
        {{ __('Updated at') }}: {{ $empresa->updated_at }}
    </p>

    <hr />

    <p>
        <a href="{{ action('EmpresaController@index') }}">{{ __('Back to index') }}</a> |

        <a href="{{ action('EmpresaController@edit', ['id' => $empresa->id]) }}">{{ __('Edit') }}</a> |

        <a href="{{ action('EmpresaController@destroy', ['id' => $empresa->id]) }}"
           id="deleteLink"
           data-toggle="modal"
           data-target="#modal"
        >
            {{ __('Delete') }}
        </a>
    </p>

    @component('components.deleteform', [
        'id' => 'deleteForm',
        'action' => action('EmpresaController@destroy', ['id' => $empresa->id])
    ])
    <h1 class="text-danger">Something went wrong</h1>
    @endcomponent
</div>

@component('components.confirmation', ['okButtonForm' => 'deleteForm'])
<h1 class="text-danger">Something went wrong</h1>
@endcomponent
@endsection
