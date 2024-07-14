@extends('admin.app.app')

@section('styles')
    <!-- Add any additional stylesheets here -->
@endsection

@section('main-content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">View Catalogs</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('custom_designs.index') }}">Custom Designs</a></li>
                                    <li class="breadcrumb-item active">View Catalogs</li>
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
                                <h5 class="mb-4">Catalogs for Custom Design: {{ $customDesign->title }}</h5>
                                <div class="row">
                                    @foreach ($catalogs as $catalog)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="card">
                                                <img src="{{ asset('uploads/catalogs/' . $catalog->front_image) }}" alt="{{ $catalog->name }}" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $catalog->name }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div> <!-- page-content -->
    </div>
@endsection

@section('scripts')
    <!-- Add any additional scripts here -->
@endsection
