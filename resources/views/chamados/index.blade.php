@extends('layouts.master')
@section('title','Lista de Chamados')

@section('content')
    <div class="container-md">
        <div class="card">
            <div class="card-header text-center">
                <a href="/" class="btn btn-primary float-start">Dashboard</a>
                <span>Chamados</span>
                <a href="{{route('chamados.create')}}" class="btn btn-success float-end">Criar um chamado</a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
