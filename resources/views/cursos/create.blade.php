@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h1>{{ __('Create :0', ['Curso']) }}</h1>
    </div>
    <form action="/cursos" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input id="inputNome" type="text" name="nome" class="form-control" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection
