@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Estágios</h1>
        <a href="{{ action('EstagioController@create') }}">{{ __('Create :0', ['Estágio']) }}</a>
    </div>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Empresa</th>
                <th>Professor</th>
                <th>Início</th>
                <th>Término</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estagios as $estagio)
            <tr>
                <td>{{ $estagio->id }}</td>
                <td>{{ $estagio->aluno->nome }}</td>
                <td>{{ $estagio->empresa->nome }}</td>
                <td>{{ $estagio->professor->nome }}</td>
                <td>{{ $estagio->data_inicio }}</td>
                <td>{{ $estagio->data_termino }}</td>
                <td>
                    <a href="{{ action('EstagioController@show',    ['id' => $estagio->id]) }}">{{ __('View') }}</a> |

                    <a href="{{ action('EstagioController@edit',    ['id' => $estagio->id]) }}">{{ __('Edit') }}</a> |

                    <a href="{{ action('EstagioController@destroy', ['id' => $estagio->id]) }}"
                       data-deleteform="deleteForm{{ $estagio->id }}"
                       data-toggle="modal"
                       data-target="#modal"
                    >
                        {{ __('Delete') }}
                    </a>

                    @component('components.deleteform', [
                        'id' => 'deleteForm'.$estagio->id,
                        'action' => action('EstagioController@destroy', ['id' => $estagio->id])
                    ])
                    <h1 class="text-danger">Something went wrong</h1>
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $estagios->links() }}
</div>

@component('components.confirmation')
<h1 class="text-danger">Something went wrong</h1>
@endcomponent

<script src="{{ asset('js/setup-delete-links.js') }}"></script>
@endsection
