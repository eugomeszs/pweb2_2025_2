@extends('base')
@section('titulo', 'Formulário Curso')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('curso.update', $dado->id);
        } else {
            $action = route('curso.store');
        }
    @endphp

    <h2>Formulario Curso</h2>

    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <div class="row">
            <div class="col">
                <label for="">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col">
                <label for="">Requisitos</label>
                <input type="text" name="requisito" value="{{ old('requisito', $dado->requisito ?? '') }}">
            </div>
            <div class="col">
                <label for="">Carga Horária</label>
                <input type="text" name="carga_horaria" value="{{ old('carga horaria', $dado->carga_horaria ?? '') }}">
            </div>
            <div class="col">
                <label for="">Valor</label>
                <input type="text" name="valor" value="{{ old('valor', $dado->valor ?? '') }}">
            </div>
    </form>
@stop
