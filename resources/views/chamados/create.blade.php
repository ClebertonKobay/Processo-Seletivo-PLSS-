@extends('layouts.master')
@section('title','Criar um chamado')
@section('content')
    <div class="container-md">
        <div class="card shadow">
            <div class="card-header bg-custom text-center text-white">
                <h1 class="d-inline-block">Criar um chamado</h1>
                <a href="{{route('chamados.index')}}" class="btn btn-secondary float-end">Voltar</a>
            </div>

            <div class="card-body">
                <form action="{{route('chamados.store')}}" method="POST" id="forms">
                    @method("POST")
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                               placeholder="Titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria_id" name="categoria_id" required>
                            <option value="">Selecione uma categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nm_categoria}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descriçao</label>
                        <textarea class="form-control" id="descricao" rows="" name="descricao" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
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
