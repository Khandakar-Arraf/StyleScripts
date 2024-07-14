@extends('admin.app.app')
@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('') }}assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('') }}assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Custom Design Colors</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Dashboards</li>
                                    <li class="breadcrumb-item active">Custom Design Colors</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('custom_design_colors.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="color" class="form-label">Color</label>

                                            <input type="color" class="form-control" id="color" name="color"
                                                required>

                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">



                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>colors</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($custom_design_colors as $k => $custom_design_color)
                                        <tr>
                                            <td>{{ $k }}</td>
                                            <td> <span class="badge "
                                                    style="background-color: {{ $custom_design_color->color }}">{{ $custom_design_color->color }}</span>
                                            </td>



                                            <td>

                                                <form hidden
                                                    action="{{ route('custom_design_colors.destroy', $custom_design_color->id) }}"
                                                    id="form{{ $custom_design_color->id }}" method="get">
                                                    @csrf
                                                </form>
                                                <button class="btn btn-danger waves-effect btn-circle waves-light"
                                                    onclick="deleteItem({{ $custom_design_color->id }});" type="button">
                                                    <i class="fa fa-trash"></i> </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    </div>
@endsection
@section('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('ok');
                    document.getElementById(`form${id}`).submit();
                }
            })
        }
    </script>
@endsection
