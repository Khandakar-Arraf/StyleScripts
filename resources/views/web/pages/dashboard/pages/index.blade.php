@extends('web.pages.dashboard.app.app')
@section('user-body')
    <div class="container">
        <!-- Dashboard Info Start -->
        <div class="dashboard-info">
            <div class="container">
                <div class="dashboard-user">
                    <div class="dashboard__content">
                        <div class="row pb-4 mb-2">
                            <div class="masthead">
                                <div class="masthead__content">

                                    @if (Auth::user() && Auth::user()->role == 1)
                                        <h1 class="display-4 fw-bold">Find a Perfect Online Appointment</h1>
                                        <form action="{{ route('filter') }}" method="POST">
                                            @csrf
                                            <div class="mt-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <select class="form-select" name="subject_id">
                                                                <option value="">--- Select Subject ---</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}">
                                                                        {{ $subject->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label class="input-group-text" for="subject_id">Subject</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <select class="form-select" name="duration">
                                                                <option value="">--- Select Duration ---</option>
                                                                @foreach ($durations as $duration)
                                                                    <option value="{{ $duration->id }}">
                                                                        {{ $duration->timeline }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label class="input-group-text" for="duration">Duration</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="rounded-16 bg-white shadow-4">
                                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active tab-link" id="user-info-tab" data-bs-toggle="tab"
                                                href="#user-info" role="tab" aria-controls="user-info"
                                                aria-selected="true">User Information</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link tab-link" id="basic-info-tab" data-bs-toggle="tab"
                                                href="#basic-info" role="tab" aria-controls="basic-info"
                                                aria-selected="false">Basic Information</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabsContent">
                                        <div class="tab-pane fade show active" id="user-info" role="tabpanel"
                                            aria-labelledby="user-info-tab">
                                            <div class="border-top pt-3">
                                                <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                                                    @csrf
                                                    <div class="row g-3">
                                                        <!-- User Information Fields -->
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Name"
                                                                value="{{ $user->name }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="tel" class="form-control" id="phone"
                                                                name="phone" placeholder="Phone"
                                                                value="{{ $user->phone }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" placeholder="Email"
                                                                value="{{ $user->email }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Profile</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="basic-info" role="tabpanel"
                                            aria-labelledby="basic-info-tab">
                                            <div class="border-top pt-3">
                                                <form
                                                    action="@if (Auth::user()->role == 1) {{ route('customer.update', $user->customer->id) }}@else{{ route('instructor.update', $user->instructor->id) }} @endif"
                                                    class="contact-form row y-gap-30" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control dropify" id="image"
                                                            name="image"
                                                            data-default-file="@if (Auth::user()->role == 1) {{ asset('uploads/customers/' . $user->customer->image) }}@else{{ asset('uploads/instructors/' . $user->instructor->image) }} @endif">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control dropify" id="file"
                                                            name="file"
                                                            data-default-file="@if (Auth::user()->role == 1) {{ asset('uploads/customers/' . $user->customer->file) }}@else{{ asset('uploads/instructors/' . $user->instructor->file) }} @endif">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label
                                                            class="form-label text-16 lh-1 fw-500 text-dark mb-10">Address</label>
                                                        <input type="text" class="form-control" placeholder="Address"
                                                            name="address"
                                                            value="@if (Auth::user()->role == 1) {{ $user->customer->address }}@else{{ $user->instructor->address }} @endif">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label text-16 lh-1 fw-500 text-dark mb-10">
                                                            @if (Auth::user()->role == 1)
                                                                School Name
                                                            @else
                                                                Birthday
                                                            @endif
                                                        </label>
                                                        <input
                                                            type="@if (Auth::user()->role == 1) text @else date @endif"
                                                            class="form-control"
                                                            placeholder="@if (Auth::user()->role == 1) School @else Birthday @endif"
                                                            name="@if (Auth::user()->role == 1) current_school @else birthday @endif"
                                                            value="@if (Auth::user()->role == 1) {{ $user->customer->current_school }}@else{{ $user->instructor->birthday }} @endif">
                                                    </div>
                                                    @if (Auth::user()->role == 2)
                                                        <div class="col-md-6">
                                                            <label
                                                                class="form-label text-16 lh-1 fw-500 text-dark mb-10">Current
                                                                Profession</label>
                                                            <select class="form-select" name="profession">
                                                                <option value="Part Time"
                                                                    @if ($user->instructor->profession == 'Part Time') selected @endif>Part
                                                                    Time
                                                                </option>
                                                                <option value="Full Time"
                                                                    @if ($user->instructor->profession == 'Full Time') selected @endif>Full
                                                                    Time
                                                                </option>
                                                                <option value="Unemployed"
                                                                    @if ($user->instructor->profession == 'Unemployed') selected @endif>
                                                                    Unemployed
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label
                                                                class="form-label text-16 lh-1 fw-500 text-dark mb-10">Specialist
                                                                You Want to Teach</label>
                                                            <select class="form-select" name="subject">
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}"
                                                                        @if ($user->instructor->subject == $subject->id) selected @endif>
                                                                        {{ $subject->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Profile</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Info End -->
    </div>
@endsection
