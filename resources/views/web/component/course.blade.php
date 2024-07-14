<div class="course-item mb-3">
    <div class="course-header">
        <div class="course-header__thumbnail ">
            <a href="{{ route('course.details',$item->id) }}"><img
                  src="{{ asset('') }}uploads/courses/{{ $item->image }}" alt="courses" width="258" height="173"></a>
        </div>
    </div>
    <div class="course-info">
        <span class="course-info__badge-text badge-all">{{ $item->durationName->timeline }}</span>
        <h3 class="course-info__title"><a href="{{ route('course.details',$item->id) }}">{{ $item->title }}</a>
        </h3>
        <div class="course-info__price">
            <span class="sale-price">${{ $item->price }}.<small class="separator">00</small></span>
        </div>

    </div>
</div>