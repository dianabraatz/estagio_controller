@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Cursos</h1>
        <a href="{{ action('CursoController@create') }}">{{ __('Create :0', ['Curso']) }}</a>
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
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nome }}</td>
                <td>
                    <a href="{{ action('CursoController@show',    ['id' => $curso->id]) }}">{{ __('View') }}</a> |

                    <a href="{{ action('CursoController@edit',    ['id' => $curso->id]) }}">{{ __('Edit') }}</a> |

                    <a href="{{ action('CursoController@destroy', ['id' => $curso->id]) }}"
                       data-deleteform="deleteForm{{ $curso->id }}"
                       data-toggle="modal"
                       data-target="#modal"
                    >
                        {{ __('Delete') }}
                    </a>

                    @component('components.deleteform', [
                        'id' => 'deleteForm'.$curso->id,
                        'action' => action('CursoController@destroy', ['id' => $curso->id])
                    ])
                    <h1 class="text-danger">Something went wrong</h1>
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cursos->links() }}
</div>

@component('components.confirmation')
<h1 class="text-danger">Something went wrong</h1>
@endcomponent

<script src="{{ asset('js/setup-delete-links.js') }}"></script>
@endsection
