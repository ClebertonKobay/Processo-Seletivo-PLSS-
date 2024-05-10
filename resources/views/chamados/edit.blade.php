@extends('layouts.master')
@section('title','Editar um chamado')
@section('content')
    <div class="container-md">
        <div class="card shadow">
            <div class="card-header bg-custom text-center text-white">
                <h1 class="d-inline-block">Editar um chamado</h1>
                <a href="{{route('chamados.index')}}" class="btn btn-secondary float-end">Voltar</a>
            </div>
            <form action="{{route('chamados.update',$chamado->id)}}" method="POST">
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                               value="{{$chamado->titulo}}"
                               placeholder="Titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria_id" name="categoria_id"
                                required>
                            <option value="">Selecione uma categoria</option>
                            @foreach($categorias as $categoria)
                                @if($chamado->categoria->id == $categoria->id)
                                    <option value="{{$categoria->id}}" selected>{{$categoria->nm_categoria}}</option>
                                @else
                                    <option value="{{$categoria->id}}">{{$categoria->nm_categoria}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descriçao</label>
                        <textarea class="form-control" id="descricao" rows="" name="descricao"
                                  required>{{$chamado->descricao}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prazo_solucao" class="form-label">Prazo de Solução</label>
                        <input type="date" class="form-control" value="{{$chamado->prazo_solucao}}"
                               id="prazo_solucao" name="prazo_solucao"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Situação</label>
                        <select class="form-select" id="categoria_id" name="situacao_id"
                                required>
                            <option value="">Selecione uma Situação</option>
                            @foreach($situacaos as $situacao)
                                @if($chamado->situacao->id == $situacao->id)
                                    <option value="{{$situacao->id}}" selected>{{$situacao->nm_situacao}}</option>
                                @else
                                    <option value="{{$situacao->id}}">{{$situacao->nm_situacao}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="data_criacao" class="form-label">Data de Criação</label>
                        <input type="date" class="form-control" value="{{$chamado->created_at_sem_hora}}"
                               id="data_criacao"
                               readonly>
                    </div>
                    <div class="mb-3">
                        <label for="data_solucao" class="form-label">Data de Solução</label>
                        <input type="date" class="form-control" value="{{$chamado->data_solucao }}"
                               id="data_solucao"
                               readonly>
                    </div>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
