@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Edit :0', ['Professor']) }}</h1>
    </div>
    <form action="{{ action('ProfessorController@update', ['id' => $professor->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" id="inputNome" class="form-control" value="{{ $professor->nome }}" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    <hr>

    <p>
        <a href="{{ action('ProfessorController@index') }}">{{ __('Back to index') }}</a>
    </p>
</div>
@endsection
