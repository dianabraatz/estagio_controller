@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>Empresas</h1>
        <a href="{{ action('EmpresaController@create') }}">{{ __('Create :0', ['Empresa']) }}</a>
    </div>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->nome }}</td>
                <td>{{ $empresa->razao_social }}</td>
                <td>{{ $empresa->cnpj }}</td>
                <td>
                    <a href="{{ action('EmpresaController@show',    ['id' => $empresa->id]) }}">{{ __('View') }}</a> |

                    <a href="{{ action('EmpresaController@edit',    ['id' => $empresa->id]) }}">{{ __('Edit') }}</a> |

                    <a href="{{ action('EmpresaController@destroy', ['id' => $empresa->id]) }}"
                       data-deleteform="deleteForm{{ $empresa->id }}"
                       data-toggle="modal"
                       data-target="#modal"
                    >
                        {{ __('Delete') }}
                    </a>

                    @component('components.deleteform', [
                        'id' => 'deleteForm'.$empresa->id,
                        'action' => action('EmpresaController@destroy', ['id' => $empresa->id])
                    ])
                    <h1 class="text-danger">Something went wrong</h1>
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $empresas->links() }}
</div>

@component('components.confirmation')
<h1 class="text-danger">Something went wrong</h1>
@endcomponent

<script src="{{ asset('js/setup-delete-links.js') }}"></script>
@endsection
