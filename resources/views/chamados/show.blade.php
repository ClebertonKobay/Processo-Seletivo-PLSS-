@extends('layouts.master')
@section('title','Visualizar um chamado')
@section('content')
    <div class="container-md">
        <div class="card shadow">
            <div class="card-header bg-custom text-center text-white">
                <h1 class="d-inline-block">Visualizar um chamado</h1>
                <a href="{{route('chamados.index')}}" class="btn btn-secondary float-end">Voltar</a>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo"
                           value="{{$chamado->titulo}}"
                           placeholder="Titulo" readonly>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoria</label>
                    <input type="text" class="form-control" value="{{$chamado->categoria->nm_categoria}}"
                           id="categoria_id" name="categoria_id"
                           readonly>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descriçao</label>
                    <textarea class="form-control" id="descricao" rows="" name="descricao"
                              readonly>{{$chamado->descricao}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Prazo de Solução</label>
                    <input type="date" class="form-control" value="{{$chamado->prazo_solucao}}"
                           id="categoria_id" name="categoria_id"
                           readonly>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Situação</label>
                    <input type="text" class="form-control" value="{{$chamado->situacao->nm_situacao}}"
                           id="categoria_id" name="categoria_id"
                           readonly>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Data de Criação</label>
                    <input type="date" class="form-control" value="{{$chamado->created_at_sem_hora}}"
                           id="categoria_id" name="categoria_id"
                           readonly>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Data de Solução</label>
                    @if(is_null($chamado->data_solucao))
                        <input type="text" class="form-control" value="A definir"
                               id="categoria_id" name="categoria_id"
                               readonly>
                    @else
                        <input type="date" class="form-control" value="{{$chamado->data_solucao }}"
                               id="categoria_id" name="categoria_id"
                               readonly>
                    @endif
                </div>


                <a href="{{route('chamados.edit',$chamado->id)}}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{--    <script type="module">--}}
    {{--        $('#forms').on('submit', function (e) {--}}
    {{--            e.preventDefault()--}}
    {{--            console.log($(this).serializeArray())--}}
    {{--        })--}}
    {{--    </script>--}}
@endpush
