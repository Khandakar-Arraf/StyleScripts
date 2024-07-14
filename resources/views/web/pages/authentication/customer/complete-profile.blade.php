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
                <h2 class="page-banner__main-title">Complete Profile</h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<div class="main-body mt-5">
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-12">
                    <div class="dashboard__content bg-light mt-5 pt-5 p-4">

                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab-item-1">

                                <div class="border-top pt-4 mt-4">
                                    @if (Auth::user()->role == 1)
                                    <form action="{{ route('customer.store') }}" method="POST" class="row g-3"
                                      enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Upload Your Profile Picture</label>
                                            <input type="file" class="form-control dropify" id="image" name="image"
                                              data-default-file="{{ old('image') }}" required>
                                            <div class="form-text">PNG or JPG no bigger than 800px wide and tall.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="file" class="form-label">Upload Your Document (related with
                                                customer identification)</label>
                                            <input type="file" class="form-control dropify" id="file" name="file"
                                              data-default-file="{{ old('file') }}" required>
                                            <div class="form-text">Only PDF/JPG/JPEG are allowed.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" name="birthday" class="form-control" max="2015-12-31"
                                              required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address" class="form-label">Address Line</label>
                                            <input type="text" name="address" class="form-control"
                                              placeholder="Address Line 1" required>
                                        </div>
                                      
                                        <div class="col-md-6">
                                            <label for="current_school" class="form-label">Current Institution</label>
                                            <input type="text" name="current_school" class="form-control"
                                              placeholder="School" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="current_class" class="form-label">Current Profession</label>
                                            <select name="current_class" class="form-select">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->title }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </form>
                                    @else
                                    <form action="{{ route('instructor.store') }}" method="POST" class="row g-3"
                                      enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Upload Your Picture</label>
                                            <input type="file" class="form-control dropify" id="image" name="image"
                                              data-default-file="{{ old('image') }}" required>
                                            <div class="form-text">PNG or JPG no bigger than 800px wide and tall.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="file" class="form-label">Upload Your Document (related with your
                                                Education Identification)</label>
                                            <input type="file" class="form-control dropify" id="file" name="file"
                                              data-default-file="{{ old('file') }}" required>
                                            <div class="form-text">Only PDF/JPG/JPEG are allowed.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" name="birthday" class="form-control"
                                              placeholder="Birthday" max="2015-12-31" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address" class="form-label">Address Line</label>
                                            <input type="text" name="address" class="form-control"
                                              placeholder="Address Line 1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="profession" class="form-label">Current Profession</label>
                                            <select name="profession" class="form-select">
                                                <option value="1">Part Time</option>
                                                <option value="2">Full Time</option>
                                                <option value="3">Unemployed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="subject" class="form-label">Specialist You Want to
                                                Teach</label>
                                            <select name="subject" class="form-select">
                                                @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
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
    </section>
</div>
@endsection
