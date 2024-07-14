@extends('web.pages.dashboard.app.app')

@section('user-body')

    <!-- Instructor List -->
    <section class="layout-pt-md layout-pb-lg">
        <div class="container animated">

            <div class="row g-4">
                @foreach ($instructors as $instructor)
                    <div class="col-lg-3 col-md-6">
                        <div data-anim-child="slide-left delay-2" class="teamCard -type-1 is-in-view">
                            <div class="teamCard__image">
                                <a href="{{ route('instructor.details', $instructor->id) }}">
                                    <img src="{{ asset('uploads/instructors/' . $instructor->instructor->image) }}"
                                        alt="Instructor Image" class="img-fluid">
                                </a>
                            </div>
                            <div class="teamCard__content">
                                <h4 class="teamCard__title">{{ $instructor->name }}</h4>
                                <p class="teamCard__text">{{ $instructor->instructor->subjects->title }}</p>
                                <div class="d-flex align-items-center pt-2">
                                    <div class="icon-play text-14 me-2"></div>
                                    <span class="text-13 lh-1">{{ $instructor->instructor->courses->count() }} Course</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Instructor List -->
@endsection
