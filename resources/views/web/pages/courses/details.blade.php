@extends('web.app.app')
@section('main-body')
    <div class="page-banner bg-color-11" style="margin-top: 150.639px;">
        <div class="page-banner__wrapper" style="margin-top: 150.639px;">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="course-grid-left-sidebar.html">courses</a></li>
                        <li class="breadcrumb-item active">{{ $course->title }}</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <div class="tutor-course-main-content section-padding-01 sticky-parent">
        <div class="container custom-container">

            <div class="row gy-10">
                <div class="col-lg-8">

                    <!-- Tutor Course Top Info Start -->
                    <div class="tutor-course-top-info">

                        <!-- Tutor Course Top Info Start -->
                        <div class="tutor-course-top-info__content">
                            <div class="tutor-course-top-info__badges">
                                @php
                                    $subjectname = App\Models\Subject::find($course->subject_id)->title;
                                @endphp
                                <a class="badges-category" href="#">{{ $subjectname }}</a>
                            </div>
                            <h1 class="tutor-course-top-info__title">{{ $course->title }}</h1>
                            <div class="tutor-course-top-info__meta">
                                <div class="tutor-course-top-info__meta-instructor">
                                    <div class="instructor-avatar">
                                        <img src="{{ asset('') }}uploads/instructors/{{ $course->creator->instructor->image }}"
                                            alt="Instructor" width="36" height="36">
                                    </div>
                                    <div class="instructor-name">{{ $course->creator->name }}</div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="tutor-course-top-info__video">
                                <div class="ratio ratio-16x9">
                                    <img src="{{ asset('') }}uploads/courses/{{ $course->image }}" alt="">
                                </div>
                            </div>
                            <p>{!! $course->description !!}</p>

                        </div>
                        <!-- Tutor Course Top Info End -->


                    </div>
                    <!-- Tutor Course Top Info End -->


                </div>
                <div class="col-lg-4">

                    <!-- Tutor Course Sidebar Start -->
                    <div class="tutor-course-sidebar sidebar-label">

                        <!-- Tutor Course Price Preview Start -->
                        <div class="tutor-course-price-preview">
                            <div class="tutor-course-price-preview__price">
                                <div class="tutor-course-price">
                                    <span class="sale-price">${{ $course->price }}<span class="separator">.00</span></span>
                                </div>
                            </div>
                            @php
                                if (Auth::user()) {
                                    $ifpurchased = App\Models\Order::query()
                                        ->where('type', 1)
                                        ->where('item_id', $course->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->get()
                                        ->count();
                                } else {
                                    $ifpurchased = 0;
                                }
                            @endphp

                            @if ($ifpurchased > 0)
                                <div class="tutor-course-price-preview__btn">
                                    <a class="btn btn-success btn-hover-secondary w-100 disabled"> <i
                                            class="fas fa-shopping-basket"></i> You Already Purchased this Item </a>
                                </div>
                            @else
                                <div class="tutor-course-price-preview__btn">
                                    <a class="btn btn-primary btn-hover-secondary w-100"
                                        href="{{ route('checkout.store', ['item' => $course->id, 'type' => '1']) }}"> <i
                                            class="fas fa-shopping-basket"></i> Purchase </a>
                                </div>
                            @endif


                        </div>
                        <!-- Tutor Course Price Preview End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget__title">Course categories</h3>
                            @php
                                $randsubjects = App\Models\Subject::where('status', 1)
                                    ->get()
                                    ->take(6);
                                // dd($randcourses);
                            @endphp
                            <ul class="sidebar-widget__link">
                                @foreach ($randsubjects as $item)
                                    <li><a href="{{ route('subject.details', $item->id) }}">{{ $item->title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget__title">Related Courses</h3>

                            <div class="sidebar-widget__course">
                                @php
                                    $randcourses = App\Models\Course::where('status', 1)
                                        ->where('subject_id', $course->subject_id)
                                        ->get()
                                        ->random(3);
                                    // dd($randcourses);
                                @endphp
                                @foreach ($randcourses as $item)
                                    <div class="sidebar-widget__course-item">
                                        <div class="sidebar-widget__course-thumbnail">
                                            <a href="{{ route('course.details', $item->id) }}"><img
                                                    src="{{ asset('') }}uploads/courses/{{ $item->image }}"
                                                    alt="Courses" width="120" height="72"></a>
                                        </div>
                                        <div class="sidebar-widget__course-content">
                                            <h4 class="sidebar-widget__course-title"><a
                                                    href="{{ route('course.details', $item->id) }}">{{ $item->title }}</a>
                                            </h4>
                                            <div class="sidebar-widget__course-price">
                                                <span class="sale-price">${{ $item->price }}<span
                                                        class="separator">.00</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach




                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                    </div>
                    <!-- Tutor Course Sidebar End -->

                </div>
            </div>


        </div>
    </div>
@endsection
