@extends('web.app.app')

@section('main-body')

<div class="page-banner bg-color-05" style="margin-top: 150.639px;">
    <div class="page-banner__wrapper" style="margin-top: 150.639px;">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title">User Profile</h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<div class="main-body">
    <div class="dashboard-user">
        <div class="dashboard__content bg-blue-4">
            <div class="row pb-4 mb-2">
                <div class="col-auto">
                    <h1 class="masthead__title text-white">
                        Dashboard
                    </h1>
                </div>
                <div class="masthead">
                    <div class="masthead__content">
                        <h1 class="text-30 lh-12 fw-700">Find a perfect Online Appointment</h1>

                        @if (Auth::user() && Auth::user()->role == 1)
                        <div class="mt-3">
                            <div class="masthead-form bg-white rounded-16">
                                <form action="{{ route('filter') }}" method="POST"
                                  class="d-flex flex-wrap align-items-center">
                                    @csrf

                                    <div class="masthead-form__item">
                                        <select class="form-control" name="subject_id">
                                            <option value="">--- Select ---</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">
                                                {{ $subject->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="masthead-form__item">
                                        <select class="form-control" name="duration">
                                            <option value="">--- Select ---</option>
                                            @foreach ($durations as $duration)
                                            <option value="{{ $duration->id }}">
                                                {{ $duration->timeline }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="masthead-form__button">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="rounded-16 bg-white shadow-4">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="user-info-tab" data-bs-toggle="tab" href="#user-info"
                                  role="tab" aria-controls="user-info" aria-selected="true">User Information</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="basic-info-tab" data-bs-toggle="tab" href="#basic-info"
                                  role="tab" aria-controls="basic-info" aria-selected="false">Basic Information</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabsContent">
                            <div class="tab-pane fade show active" id="user-info" role="tabpanel"
                              aria-labelledby="user-info-tab">
                                <div class="border-top-light pt-3">
                                    <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <!-- User Information Fields -->
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                  placeholder="Name" value="{{ $user->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                  placeholder="Phone" value="{{ $user->phone }}">
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                  placeholder="Email" value="{{ $user->email }}">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                                <div class="border-top-light pt-3">
                                    @if (Auth::user()->role == 1)
                                    <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <!-- Basic Information Fields -->
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                  placeholder="Name" value="{{ $user->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                  placeholder="Phone" value="{{ $user->phone }}">
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                  placeholder="Email" value="{{ $user->email }}">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                    @elseif (Auth::user()->role == 2)
                                    <form action="{{ route('instructor.update', $user->instructor->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3">
                                            <!-- Instructor Information Fields -->
                                            <div class="col-md-6">
                                                <label for="image" class="form-label">Profile Image</label>
                                                <input type="file" class="form-control dropify" id="image" name="image"
                                                  data-default-file="{{ asset('uploads/instructors/'.$user->instructor->image) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="file" class="form-label">Additional File</label>
                                                <input type="file" class="form-control dropify" id="file" name="file"
                                                  data-default-file="{{ asset('uploads/instructors/'.$user->instructor->file) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="birthday" class="form-label">Birthday</label>
                                                <input type="date" class="form-control" id="birthday" name="birthday"
                                                  value="{{ $user->instructor->birthday }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                  value="{{ $user->instructor->address }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="profession" class="form-label">Current Profession</label>
                                                <select class="form-select" id="profession" name="profession">
                                                    <option value="Part Time" @if ($user->instructor->profession ==
                                                        "Part Time") selected @endif>Part Time</option>
                                                    <option value="Full Time" @if ($user->instructor->profession ==
                                                        "Full Time") selected @endif>Full Time</option>
                                                    <option value="Unemployed" @if ($user->instructor->profession ==
                                                        "Unemployed") selected @endif>Unemployed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="subject" class="form-label">Subject You Want to
                                                    Teach</label>
                                                <select class="form-select" id="subject" name="subject">
                                                    @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}" @if ($user->
                                                        instructor->subject == $subject->id) selected @endif>
                                                        {{ $subject->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@push('script')
<!-- Add this script at the end of your HTML, just before the closing </body> tag -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Get all tab links and tab content panes
    const tabLinks = document.querySelectorAll('.nav-link[data-bs-toggle="tab"]');
    const tabPanes = document.querySelectorAll('.tab-pane');

    // Add click event listeners to each tab link
    tabLinks.forEach((tabLink) => {
      tabLink.addEventListener('click', (event) => {
        event.preventDefault();

        // Remove 'active' class from all tab links and tab panes
        tabLinks.forEach((link) => {
          link.classList.remove('active');
        });
        tabPanes.forEach((pane) => {
          pane.classList.remove('active', 'show');
        });

        // Add 'active' class to the clicked tab link and corresponding tab pane
        const targetTabId = event.target.getAttribute('href').replace('#', '');
        const targetTabPane = document.getElementById(targetTabId);

        if (targetTabPane) {
          tabLink.classList.add('active');
          targetTabPane.classList.add('active', 'show');
        }
      });
    });
  });
</script>

@endpush
@endsection