@extends('web.pages.dashboard.app.app')

@push('style')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
@section('user-body')
    <div class="container">
        <!-- Dashboard Info Start -->
        <div class="dashboard-info">
            <div class="container">
                <div class="dashboard-user">
                    <div class="dashboard__content">
                        <div class="row pb-50 mb-10">
                            <div class="col-auto">

                                <h1 class="text-30 lh-12 fw-700">Create New Course</h1>

                            </div>
                        </div>


                        <div class="row y-gap-60">
                            <div class="col-12">
                                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                                  
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2 class="text-24 lh-1 text-primary mb-4">Create a New Course</h2>
                                                <form class="row g-3" action="{{ route('courses.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="creator_id" value="{{ Auth::user()->id }}"
                                                        hidden>

                                                    <div class="col-md-6">
                                                        <label for="title" class="form-label">Course Title*</label>
                                                        <input type="text" class="form-control" id="title"
                                                            name="title"
                                                            placeholder="Learn Figma - UI/UX Design Essential Training"
                                                            required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="price" class="form-label">Course Price*</label>
                                                        <input type="text" class="form-control" id="price"
                                                            name="price" placeholder="99.00" required>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="description" class="form-label">Course
                                                            Description*</label>
                                                        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="7" required></textarea>
                                                    </div>

                                                    {{-- <div class="col-md-6">
                                            <label for="class" class="form-label">Class*</label>
                                            <select class="form-select" id="class" name="class_id" required>
                                                <option value="">Select Class</option>
                                                @foreach ($categories as $class)
                                                <option value="{{ $class->id }}">{{ $class->title }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}

                                                    <div class="col-md-6">
                                                        <label for="subject" class="form-label">Subject*</label>
                                                        <select class="form-select" id="subject" name="subject_id"
                                                            required>
                                                            <option value="">Select Subject</option>
                                                            @foreach ($subjects as $subject)
                                                                <option value="{{ $subject->id }}">{{ $subject->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="duration" class="form-label">Duration*</label>
                                                        <select class="form-select" id="duration" name="duration" required>
                                                            <option value="">Select duration</option>
                                                            @foreach ($durations as $duration)
                                                                <option value="{{ $duration->id }}">
                                                                    {{ $duration->timeline }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="image" class="form-label">Image*</label>
                                                        <input type="file" class="form-control dropify" id="image"
                                                            name="image" required>
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Create
                                                            Course</button>
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

            <script>
                $('#summernote').summernote({
                    placeholder: 'Hello i am html ediotr',
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            </script>
        @endsection
