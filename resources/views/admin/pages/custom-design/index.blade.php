@extends('admin.app.app')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Custom Designs</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">Custom Designs</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-soft-primary waves-effect waves-light mb-2"
                                    href="{{ route('custom_designs.create') }}">
                                    + Create New Custom Design
                                </a>

                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($custom_designs as $custom_design)
                                            <tr>
                                                <td>
                                                    @if ($custom_design->status == 1)
                                                        <span
                                                            class="badge rounded-pill badge-soft-success font-size-11">Active</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill badge-soft-danger font-size-11">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $custom_design->title }}</td>
                                                <td>
                                                    @if ($custom_design->image)
                                                        <img src="{{ asset('uploads/catalogs/' . $custom_design->image) }}"
                                                            alt="{{ $custom_design->title }}" width="80">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($custom_design->status == 1)
                                                        <form
                                                            action="{{ route('custom_designs.inactive', $custom_design->id) }}"
                                                            method="get">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-success waves-effect btn-circle waves-light">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form
                                                            action="{{ route('custom_designs.active', $custom_design->id) }}"
                                                            method="get">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger waves-effect btn-circle waves-light">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <a class="btn btn-primary waves-effect btn-circle waves-light"
                                                        href="{{ route('custom_designs.edit', $custom_design->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    {{-- <a href="{{ route('custom_designs.view', $custom_design->id) }}"
                                                        class="btn btn-info waves-effect btn-circle waves-light view-catalogs">
                                                        <i class="fa fa-eye"></i>
                                                    </a> --}}

                                                    <form hidden
                                                        action="{{ route('custom_designs.destroy', $custom_design->id) }}"
                                                        id="form{{ $custom_design->id }}" method="get">
                                                        @csrf
                                                    </form>

                                                    <button class="btn btn-danger waves-effect btn-circle waves-light"
                                                        onclick="deleteItem({{ $custom_design->id }});" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.view-catalogs').click(function() {
                var title = $(this).data('title');
                var customDesignId = $(this).data('id');
                var modal = $('#viewCatalogsModal');
                var modalTitle = $('#catalogTitle');
                var catalogsContainer = $('#catalogsContainer');

                // Set the modal title
                modalTitle.text(title);

                // Clear previous catalog content
                catalogsContainer.empty();

                // Construct the AJAX request URL
                var url = "{{ url('get-catalogs') }}/" + customDesignId;

                // Retrieve catalogs via AJAX (replace with your route)
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.length > 0) {
                            // Loop through catalogs and display them in the modal
                            $.each(response, function(index, catalog) {
                                catalogsContainer.append(
                                    '<div class="catalog-item">' +
                                    '<h5>Catalog Name: ' + catalog.name + '</h5>' +
                                    '<img src="' + catalog.front_image +
                                    '" alt="Front Image" width="100">' +
                                    '<img src="' + catalog.back_image +
                                    '" alt="Back Image" width="100">' +
                                    '</div>'
                                );
                            });
                        } else {
                            catalogsContainer.html('<p>No catalogs found.</p>');
                        }
                    },
                    error: function() {
                        catalogsContainer.html('<p>Error loading catalogs.</p>');
                    }
                });
            });
        });


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
                    document.getElementById(`form${id}`).submit();
                }
            });
        }
    </script>
@endsection
