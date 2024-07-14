@extends('web.pages.dashboard.app.app')
@section('user-body')
    <div class="container">
        <!-- Dashboard Info Start -->
        <div class="dashboard-info">
            <div class="container">
                <div class="dashboard-user">
                    <div class="dashboard__content">
                        <div class="row pb-50 mb-10">
                            <div class="col-auto">

                                <h1 class="text-30 lh-12 fw-700">My Courses</h1>

                            </div>
                        </div>


                        <div class="container">
                            {{-- <div class="row mt-4">
                                <div class="col-md-6">
                                    <form class="form-inline">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Courses">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="icon-search text-light-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="row mt-4">
                                @foreach ($orders as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <img src="{{ asset('/uploads/courses/' . $item->course->image) }}" alt="{{ $item->course->title }}" class="card-img-top">
                                            <div class="card-body">
                                                <p class="text-14">{{ $item->course->creator->name }}</p>
                                                @if ($item->status == 2)
                                                    <div class="text-14 text-danger">Pending</div>
                                                @else
                                                    <div class="text-14 text-success">Active</div>
                                                @endif
                                                <h5 class="card-title text-16 fw-500 mt-2">{{ $item->course->title }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
