@extends('web.pages.dashboard.app.app')

@section('user-body')
    <!-- Page Header -->
    <section class="page-header -type-3 bg-purple-1">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="page-header__content text-center text-white">
                        <div class="page-header__img">
                            <img src="{{ asset('uploads/instructors/' . $instructor->instructor->image) }}"
                                alt="Instructor Image">
                        </div>
                        <div class="page-header__info pt-20">
                            <h1 class="text-30 lh-14 fw-700">{{ $instructor->name }}</h1>
                            <p>{{ $instructor->instructor->subjects->title }}</p>
                            <div class="d-flex x-gap-20 pt-15">
                                <div class="d-flex items-center">
                                    <div class="icon-play me-2"></div>
                                    <div class="text-13 lh-1">{{ $instructor->instructor->courses->count() }} Courses</div>
                                </div>
                            </div>
                        </div>
                        <!-- @if ($isPurchased)
    <div class="d-flex items-center mt-30">
                                    <a href="{{ route('chat.show.customer', $instructor->id) }}" class="btn btn-md btn-success">Send Message</a>
                                </div>
    @endif -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- Instructor Courses -->
    <section class="layout-pt-md layout-pb-lg">
        <div class="container animated">
            <div class="row justify-center">
                @foreach ($instructor->instructor->courses as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="course-item mb-3">
                            <div class="course-header">
                                <div class="course-header__thumbnail ">
                                    <a href="{{ route('course.details', $item->id) }}"><img
                                            src="{{ asset('') }}uploads/courses/{{ $item->image }}" alt="courses"
                                            width="258" height="173"></a>
                                </div>
                            </div>
                            <div class="course-info">
                                <span class="course-info__badge-text badge-all">{{ $item->durationName->timeline }}</span>
                                <h3 class="course-info__title"><a
                                        href="{{ route('course.details', $item->id) }}">{{ $item->title }}</a>
                                </h3>
                                <div class="course-info__price">
                                    <span class="sale-price">${{ $item->price }}.<small
                                            class="separator">00</small></span>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Instructor Courses -->
@endsection
