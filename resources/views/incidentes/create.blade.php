@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nuevo incidente',
])
    @slot('body')
    <form action="{{ route('incidentes.store') }}" method="post" autocomplete="off">
        @include('incidentes._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar incidente</button>
        <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection