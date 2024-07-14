<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>


        <li class="menu-title" key="t-menu">Web Contents</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">users</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('users.index') }}" key="t-list">All users</a></li>
                <li><a href="{{ route('users.customer') }}" key="t-list">customer</a></li>
                <li><a href="{{ route('users.customer.confirmation') }}" key="t-list">customer confirmation</a></li>
                <li><a href="{{ route('users.instructor') }}" key="t-list">instructor</a></li>
                <li><a href="{{ route('users.instructor.confirmation') }}" key="t-list">instructor confirmation</a>
                </li>


            </ul>
        </li>
        {{-- start - attendance --}}
        {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-attendance">Attendance</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('attendances.index') }}" key="t-list">All Attendance</a></li>


            </ul>
        </li> --}}
        {{-- End - attendance --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Chat">Chat</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('admin.chat.index') }}" key="t-list">All Chat</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Orders</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('orders.index') }}" key="t-list">All Orders</a></li>
                <li><a href="{{ route('orders.product') }}" key="t-list">Product</a></li>
                <li><a href="{{ route('orders.course') }}" key="t-list">Course</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Custom Design Management</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('purchase_requests.index') }}" key="t-list">Purchase Requests</a></li>
                <li><a href="{{ route('custom_designs.index') }}" key="t-list">All Catalogs</a></li>
                <li><a href="{{ route('custom_design_icons.index') }}" key="t-list">Gravators</a></li>
                <li><a href="{{ route('custom_design_colors.index') }}" key="t-list">Colors</a></li>



            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Ledger sheets</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('profit.course.index') }}" key="t-list">Courses</a></li>
                <li><a href="{{ route('profit.shop.index') }}" key="t-list">Shop</a></li>
                <li><a href="{{ route('profit.sale.index') }}" key="t-list">sale</a></li>
                <li><a href="{{ route('profit.chart.index') }}" key="t-list">charts</a></li>


            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Courses</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('durations.index') }}" key="t-list">Timelines</a></li>
                <li><a href="{{ route('courses.all') }}" key="t-list">All Courses</a></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <span key="t-Category">Professions</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('categories.index') }}" key="t-list">All Professions</a></li>
                        <li><a href="{{ route('categories.create') }}" key="t-create">Create Professions</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <span key="t-subject">Subject</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('subjects.index') }}" key="t-list">All Subject</a></li>
                        <li><a href="{{ route('subjects.create') }}" key="t-create">Create Subject</a></li>

                    </ul>
                </li>

            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">Shop</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('products.index') }}" key="t-list">All Shop</a></li>
                <li><a href="{{ route('products.create') }}" key="t-create">Create Shop</a></li>

            </ul>
        </li>




        {{-- start - blog --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-blog">Blog</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('blogs.index') }}" key="t-list">All Blog</a></li>
                <li><a href="{{ route('blogs.create') }}" key="t-create">Create Blog</a></li>

            </ul>
        </li>
        {{-- End - blog --}}
        {{-- start - website-content --}}
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-hero">Website Content</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('about.edit', 1) }}" key="t-list">About Us</a></li>
                <li><a href="{{ route('contact.edit', 1) }}" key="t-list">Contact Info</a></li>
                <li><a href="{{ route('general.edit', 1) }}" key="t-list">General Setting</a></li>

            </ul>

        </li>
        {{-- End - website-content --}}
    </ul>
</div>
