@extends('base')
@section('titulo', 'Listagem de Cursos')
@section('conteudo')

    <h3>Listagem de Cursos</h3>

    <div class="row">
        <div class="col">
            <form action="{{ route('curso.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="requisito">Requisitos</option>
                            <option value="carga_horaria">Carga Horária</option>
                            <option value="valor">Valor</option>
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
                        <a class="btn btn-success" href="{{ url('/curso/create') }}"> <i class="fa-solid fa-plus"></i>
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
                    <td>Requisitos</td>
                    <td>Carga Horária</td>
                    <td>Valor</td>
                    <td>Ação</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td><img src="/storage/{{ $nome_imagem }}" width="100px" height="100px" alt="img"></td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->requisito }}</td>
                        <td>{{ $item->carga_horaria }}</td>
                        <td>{{ $item->valor }}</td>
                        <td>
                            <a href="{{ route('curso.edit', $item->id) }}" class="btn btn-outline-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('curso.destroy', $item->id) }}" method="post">
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
