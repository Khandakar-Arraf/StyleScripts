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
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Transactions</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Dashboards</li>
                                    <li class="breadcrumb-item active">Course Ledger sheet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row mt-3">
                    <form action="{{ route('profit.course.index') }}" method="get">
                        @csrf
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="filterInstructor" class="form-label">Filter by Instructor</label>
                                <select id="filterInstructor" name="instructorId" class="form-select">
                                    <option value="0">All Instructors</option>
                                    @foreach ($instructors as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                    <!-- Add options for instructors here -->
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatable-buttons2" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Invoice ID</th>
                                            <th>Instructor Name</th>
                                            <th>Amount</th>
                                            <th>Ratio</th>
                                            <th>Instructor</th>
                                            <th>Owner</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <!-- Update the table body to an empty tbody -->
                                    <tbody id="filteredData">
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->order->course->title }}</td>
                                                <td>{{ $transaction->invoice }}</td>
                                                <td>{{ $transaction->creator->name }}</td>
                                                <td>
                                                    {{ $transaction->amount }}

                                                </td>

                                                <td>{{ $transaction->ratio }} %</td>
                                                <td>{{ $transaction->instructor }} $</td>
                                                <td>{{ $transaction->owner }} $</td>
                                                <td>{{ $transaction->created_at->format('d-m-y h:i:a') }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <!-- Add this script to load data using AJAX -->
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        {{ $transactions->links() }}
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection



<!-- ... (your existing code) -->


<!-- ... (your existing code) -->
