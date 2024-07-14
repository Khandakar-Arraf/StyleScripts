<div class="col-12 col-xl-3 col-lg-4 col-md-6 col-sm-12">
    <div class="card rounded-3 shadow">
        <div class="position-relative">

            <img class="card-img-top rounded-8" src="{{ asset('/uploads/courses/' . $course->image) }}"
                alt="{{ $course->title }}">
        </div>
        <div class="position-absolute top-0 end-0 m-3">
            <div class="dropdown">
                <button class="btn btn-light shadow-none dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if ($course->status == 1)
                        <a class="dropdown-item" href="{{ route('courses.archive', $course->id) }}">
                            <i class="bi bi-archive-fill me-2"></i> Delete Course
                        </a>
                    @endif
                    <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}">
                        <i class="bi bi-pencil-fill me-2"></i> Edit Course
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                @if ($course->status == 2)
                    <span class="badge bg-warning text-white">Pending</span>
                @elseif ($course->status == 1)
                    <span class="badge bg-success text-white">Active</span>
                @elseif ($course->status == 3)
                    <span class="badge bg-primary text-white">Archived</span>
                @else
                    <span class="badge bg-danger text-white">Inactive</span>
                @endif
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-12 text-muted">{{ $course->creator->name }}</div>
            </div>
            <h5 class="card-title text-14 fw-bold mt-2">{{ $course->title }}</h5>
        </div>
        <div class="card-footer bg-light d-flex justify-content-between align-items-center bg-white">

            <a href="{{ route('course.details', $course->id) }}" class="btn btn-primary mx-auto">View
                Details</a>
        </div>

    </div>
</div>
