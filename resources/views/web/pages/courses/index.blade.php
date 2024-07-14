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

        <div class="row g-3">
            <div class="col-12">
              <div class="rounded-16 bg-white shadow-sm h-100">
                <ul class="nav nav-tabs pt-3 px-3 border-bottom">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-item-1">
                      All Courses
                    </button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-item-2">
                      Active
                    </button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-item-3">
                      Pending
                    </button>
                  </li>
                  <li class="nav-item d-none">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-item-4">
                      Archived
                    </button>
                  </li>
                </ul>
                <div class="tab-content py-3 px-3">
                  <div class="tab-pane fade show active" id="tab-item-1">
                    <div class="row g-3 pt-3">
                      @foreach($courses as $course)
                      @include('web.pages.courses.p-course')
                      @endforeach
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-item-2">
                    <div class="row g-3 pt-3">
                      @foreach($courses->where('status',1) as $course)
                      @include('web.pages.courses.p-course')
                      @endforeach
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-item-3">
                    <div class="row g-3 pt-3">
                      @foreach($courses->where('status',2) as $course)
                      @include('web.pages.courses.p-course')
                      @endforeach
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-item-4">
                    <div class="row g-3 pt-3">
                      @foreach($courses->where('status',3) as $course)
                      @include('web.pages.courses.p-course')
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
{{-- 
    <footer class="footer -dashboard py-30">
        <div class="row items-center justify-between">
            <div class="col-auto">
                <div class="text-13 lh-1">© 2022 Educrat. All Right Reserved.</div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center flex-wrap x-gap-20">
                        <div>
                            <a href="help-center.html" class="text-13 lh-1">Help</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Privacy Policy</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Cookie Notice</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Security</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Terms of Use</a>
                        </div>
                    </div>

                    <button class="button -md -rounded bg-light-4 text-light-1 ml-30">English</button>
                </div>
            </div>
        </div>
    </footer> --}}
</div>
</div>
</div>
</div>

@endsection
