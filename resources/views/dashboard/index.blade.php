@extends('layouts.dashboard')

@section('title')
    Halaman Utama Dashboard
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Grafik Data Arsip Surat</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Jumlah Surat Yang Diarsipkan</h6>
                    </div>
                </div>
                <div class="table-responsive h-100">
                    <table class="table">
                        <tbody>
                            <h1 class="text-center" style="font-size: 100px; margin-top: 20%;">
                                <?php echo str_pad($jumlah, 5, '0', STR_PAD_LEFT); ?>
                            </h1>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript-internal')
    <script type="text/javascript">
        var ctx1 = document.getElementById("pie-chart").getContext("2d");

        new Chart(ctx1, {
            type: "pie",
            data: {
                labels: {!! json_encode($label) !!},
                datasets: [{
                    label: 'My First Dataset',
                    data: {!! json_encode(array_values($kategori)) !!},
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(0, 142, 145)',
                    ],
                    hoverOffset: 4
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                title: {
                    display: true,
                    text: 'Chart.js Pie Chart'
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            },
        });
    </script>
@endpush
