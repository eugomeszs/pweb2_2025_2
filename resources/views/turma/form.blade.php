@extends('base')
@section('titulo', 'Formulário Turma')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('turma.update', $dado->id);
        } else {
            $action = route('turma.store');
        }
    @endphp

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
                <label for="">Código</label>
                <input type="text" name="codigo" value="{{ old('codigo', $dado->codigo ?? '') }}">
            </div>
            <div class="col">
                <label for="">Data Inicio</label>
                <input type="text" name="data_inicio" value="{{ old('data_inicio', $dado->data-inicio ?? '') }}">
            </div>
            <div class="col">
                <label for="">Data Fim</label>
                <input type="text" name="data_fim" value="{{ old('data-fim', $dado->telefone ?? '') }}">
            </div>

            <div class="col">
                <label for="">Curso</label>
                <select name="curso_id">
                    @foreach ($curso as $item)
                        <option value="{{ $item->id }}"
                            {{ old('curso_id', $dado->curso_id ?? '')
                                    == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ url('turma') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
@stop
