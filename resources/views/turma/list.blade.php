@extends('base')
@section('titulo', 'Listagem de Turmas')
@section('conteudo')

    <h3>Listagem de Turmas</h3>

    <div class="row">
        <div class="col">
            <form action="{{ route('turma.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="codigo">Codigo</option>
                            <option value="data_inicio">Data Inicio</option>
                            <option value="data_fim">Data Fim</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </button>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-success" href="{{ url('/turma/create') }}"> <i class="fa-solid fa-plus"></i>
                            Novo</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row">

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Nome</td>
                    <td>Código</td>
                    <td>Data Inicio</td>
                    <td>Data Fim</td>
                    <td>Ação</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->data_inicio }}</td>
                        <td>{{ $item->data_fim }}</td>
                        <td>
                            <a href="{{ route('turma.edit', $item->id) }}" class="btn btn-outline-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('turma.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Deseja Remover o registro?')"> <i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
