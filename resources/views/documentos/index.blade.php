@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Documentos</h1>
        <a href="{{ action('DocumentoController@create') }}">{{ __('Create :0', ['Documento']) }}</a>
    </div>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
            <tr>
                <td>{{ $documento->id }}</td>
                <td>{{ $documento->nome }}</td>
                <td>{{ $documento->descricao }}</td>
                <td>
                    <a href="{{ action('DocumentoController@show',    ['id' => $documento->id]) }}">{{ __('View') }}</a> |

                    <a href="{{ action('DocumentoController@edit',    ['id' => $documento->id]) }}">{{ __('Edit') }}</a> |

                    <a href="{{ action('DocumentoController@destroy', ['id' => $documento->id]) }}"
                       data-deleteform="deleteForm{{ $documento->id }}"
                       data-toggle="modal"
                       data-target="#modal"
                    >
                        {{ __('Delete') }}
                    </a>

                    @component('components.deleteform', [
                        'id' => 'deleteForm'.$documento->id,
                        'action' => action('DocumentoController@destroy', ['id' => $documento->id])
                    ])
                    <h1 class="text-danger">Something went wrong</h1>
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $documentos->links() }}
</div>

@component('components.confirmation')
<h1 class="text-danger">Something went wrong</h1>
@endcomponent

<script src="{{ asset('js/setup-delete-links.js') }}"></script>
@endsection
