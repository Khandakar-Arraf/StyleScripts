@extends('admin.app.app')
@section('main-content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Customers CHart</h4>

                                <div class="row text-center">
                                    <div class="col-4">
                                        <h5 class="mb-0">{{ $users->count() }}</h5>
                                        <p class="text-muted text-truncate">Users</p>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="mb-0">{{ $users->where('role', 2)->count() }}</h5>
                                        <p class="text-muted text-truncate">Instructor</p>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="mb-0">{{ $users->where('role', 1)->count() }}</h5>
                                        <p class="text-muted text-truncate">Customer</p>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="mb-0">{{ $users->where('role', 0)->count() }}</h5>
                                        <p class="text-muted text-truncate">Admin</p>
                                    </div>
                                </div>

                                <canvas id="stupie" data-colors='["--bs-success", "#ebeff2"]' height="260"></canvas>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Transaction Modal -->

        <!-- end modal -->


    </div>

@section('scripts')
    <script src="{{ asset('') }}assets/admin/libs/chart.js/Chart.bundle.min.js"></script>
    {{-- <script src="{{ asset('') }}assets/admin/js/pages/chartjs.init.js"></script>
--}}
    <script>
        const ctx = document.getElementById('stupie');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Instructor', 'Customer', 'Admin'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [{{ $users->where('role', 2)->count() }}, {{ $users->where('role', 1)->count() }},
                        {{ $users->where('role', 0)->count() }}
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
@endsection
