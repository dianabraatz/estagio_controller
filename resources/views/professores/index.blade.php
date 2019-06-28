@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Professores</h1>
        <a href="{{ action('ProfessorController@create') }}">{{ __('Create :0', ['Professor']) }}</a>
    </div>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professores as $professor)
            <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->nome }}</td>
                <td>
                    <a href="{{ action('ProfessorController@show',    ['id' => $professor->id]) }}">{{ __('View') }}</a> |

                    <a href="{{ action('ProfessorController@edit',    ['id' => $professor->id]) }}">{{ __('Edit') }}</a> |

                    <a href="{{ action('ProfessorController@destroy', ['id' => $professor->id]) }}"
                       data-deleteform="deleteForm{{ $professor->id }}"
                       data-toggle="modal"
                       data-target="#modal"
                    >
                        {{ __('Delete') }}
                    </a>

                    @component('components.deleteform', [
                        'id' => 'deleteForm'.$professor->id,
                        'action' => action('ProfessorController@destroy', ['id' => $professor->id])
                    ])
                    <h1 class="text-danger">Something went wrong</h1>
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $professores->links() }}
</div>

@component('components.confirmation')
<h1 class="text-danger">Something went wrong</h1>
@endcomponent

<script src="{{ asset('js/setup-delete-links.js') }}"></script>
@endsection
