@extends('layouts.master')
@section('content')
    <div class="container-md">
        <div class="card shadow">
            <div class="card-header bg-custom text-center text-white">
                <h1 class="d-inline-block">Dashboard</h1>
                <a href="{{route('chamados.index')}}" class="btn btn-secondary float-end">Chamados</a>
            </div>

            <div class="card-body">
                <div class="card-body">
                    <canvas style="max-height: 250px" id="myChart"></canvas>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        function grafico(dados) {
            let ctx = document.getElementById('myChart').getContext('2d');

            console.log(dados);
            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dados.dias.map(entry => entry),
                    datasets: [{
                        label: "N° chamados atendidos",
                        data: dados.chamadosResolvidos,
                        borderWidth: 1
                    }, {
                        label: "N° chamados criados",
                        data: dados.chamadosCriados,
                        borderWidth: 1
                    }],
                },
                options: {
                    animation: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1,
                            ticks: {
                                precision: 0 // Configuração para exibir apenas números inteiros
                            }
                        }
                    }
                }
            });
        }

        $(document).ready(function () {
            $.ajax({
                url: '{{ route('dashboard.index') }}',
                type: 'GET',
                success: function (response) {
                    grafico(response);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });

    </script>
@endpush
