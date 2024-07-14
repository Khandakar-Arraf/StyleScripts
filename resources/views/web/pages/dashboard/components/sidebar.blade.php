<div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30">
    @if (request()->routeIs('user.*', 'chat.*', 'attendance.*', 'instructor.*'))
    <div class="dashboard-nav__menu">
        <ul class="dashboard-nav__menu-list">
            <li>
                <a href="{{ route('user.dashboard') }}">
                    <i class="text-20 icon-discovery me-3"></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('attendance.index') }}" class="d-flex items-center text-17 lh-1 fw-500">
            <i class="text-20 icon-edit me-3"></i>
            Attendance
            </a>
            </li> --}}
            @if (Auth::user()->role == 2)
            <li>
                <a href="{{ route('chat.inbox.instructor') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-discovery me-3"></i>
                    Chat
                </a>
            </li>
            <li>
                <a href="{{ route('user.courses.index') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-play-button me-3"></i>
                    My courses
                </a>
            </li>
            <li>
                <a href="{{ route('user.sales') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-play-button me-3"></i>
                    Sale List
                </a>
            </li>
            @else
            <li>
                <a href="{{ route('instructor.all') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-book me-3"></i>
                    Instructors
                </a>
            </li>
            <li>
                <a href="{{ route('chat.inbox.customer') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-discovery me-3"></i>
                    Chat
                </a>
            </li>
            <li>
                <a href="{{ route('user.courses.customer') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-play-button me-3"></i>
                    My courses
                </a>
            </li>
            <li>
                <a href="{{ route('user.purchase') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-list me-3"></i>
                    Purchase List
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 2)
            <li>
                <a href="{{ route('user.course.create') }}" class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-list me-3"></i>
                    Create course
                </a>
            </li>
            @endif
            <li>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  class="d-flex items-center text-17 lh-1 fw-500">
                    <i class="text-20 icon-power me-3"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    @else
    <div class="sidebar -base-sidebar">
        <div class="sidebar__inner">
            <div>
                <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">General</div>
                <div>
                    @if (Auth::user())
                    <div class="dashboard-nav__menu">
                        <ul class="dashboard-nav__menu-list">
                            <li>
                                <a href="{{ route('user.dashboard') }}"
                                  class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                    <i class="text-20 icon-discovery me-3"></i>
                                    Dashboard
                                </a>
                            </li>
                            @if (Auth::user()->role == 2)
                            @else
                            <li>
                                <a href="{{ route('course.all') }}"
                                  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                    <i class="text-20 icon-play-button me-3"></i>
                                    courses
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('instructor.all') }}"
                                  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                    <i class="text-20 icon-book me-3"></i>
                                    Doctors
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('product.all') }}"
                                  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                    <i class="text-20 icon-list me-3"></i>
                                    Shop
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
