<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('user.dashboard') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('user.dashboard') }}" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="courses.html" class="nav-item nav-link">Courses</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>

            @if (session('user'))
                <form action="{{ route('login.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-item nav-link"
                        style="border:none; background: none">Logout</button>
                </form>
            @else
                <a href="{{ route('login.login') }}" class="nav-item nav-link">Login</a>
            @endif

            <li class="nav-item dropdown pe-3" style="margin-top: -8px;">
                @if (session('user'))
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('storage/' . session('user')->Avatar) }}" class="rounded-circle"
                            style="height: 40px; width: 40px;">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ session('user')->UserName }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="margin-left: -60px;">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('userProfile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('userProfile') }}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <form action="{{ route('login.logout') }}" method='Post'>
                            <li>
                                <a class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    @csrf
                                    <button type="submit"
                                        style="border: none; width: 150px; height: 30px;">Logout</button>
                                </a>
                            </li>
                        </form>
                    </ul>
                @endif
            </li>

            <a href="{{ route('create_event') }}" style="text-decoration: none;">
                <button
                    style="width: 120px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.2); color: black; border-radius: 5px; cursor: pointer; background-color: white; margin-top: 5px;">
                    Tạo sự kiện
                </button>
            </a>
        </div>
    </div>
</nav>
