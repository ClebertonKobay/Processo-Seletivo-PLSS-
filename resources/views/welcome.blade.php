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
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <script>
            function grafico(data) {
                let ctx = document.getElementById('myChart').getContext('2d');

                let myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.map(entry => entry.dayName),
                        datasets: [{
                            label: "N° chamados atendidos",
                            data: data.map(entry => entry.countC),
                            borderWidth: 1
                        }, {
                            label: "N° chamados criados",
                            data: data.map(entry => entry.countD),
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
                        grafico(response.data);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });

        </script>

    @endpush
@endsection
