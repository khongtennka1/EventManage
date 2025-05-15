<nav class="navbar navbar-expand-lg py-3 sticky-top navbar-blur" id="mainNav">
    <div class="container">
        <!-- Brand -->
        <a href="{{ route('user.index') }}" class="navbar-brand d-flex align-items-center">
            <div class="brand-container">
                <i class="fa fa-book brand-icon me-2"></i>
                <h2 class="m-0 fw-bold brand-text">VinhEvent</h2>
            </div>
        </a>
        
        <!-- Toggle Button -->
        <button type="button" class="navbar-toggler border-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
          <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{ route('user.index') }}" class="nav-item nav-link position-relative mx-2 px-3 {{ request()->routeIs('user.index') ? 'active fw-medium' : '' }}">
                    <i class="bi bi-house-door-fill me-1"></i>Trang chủ
                    <span class="nav-indicator position-absolute bottom-0 start-50 translate-middle-x {{ request()->routeIs('user.index') ? 'active-indicator' : '' }}"></span>
                </a>
                <a href="{{ route('EventSearch') }}" class="nav-item nav-link position-relative mx-2 px-3 {{ request()->routeIs('event_manage') ? 'active fw-medium' : '' }}">
                    <i class="bi bi-calendar-event-fill me-1"></i>Sự kiện
                    <span class="nav-indicator position-absolute bottom-0 start-50 translate-middle-x {{ request()->routeIs('event_manage') ? 'active-indicator' : '' }}"></span>
                </a>
                <a href="#" class="nav-item nav-link position-relative mx-2 px-3">
                    <i class="bi bi-activity me-1"></i>Hoạt động
                    <span class="nav-indicator position-absolute bottom-0 start-50 translate-middle-x"></span>
                </a>
                <a href="#" class="nav-item nav-link position-relative mx-2 px-3">
                    <i class="bi bi-newspaper me-1"></i>Tin tức
                    <span class="nav-indicator position-absolute bottom-0 start-50 translate-middle-x"></span>
                </a>
                <a href="#" class="nav-item nav-link position-relative mx-2 px-3">
                    <i class="bi bi-bell-fill me-1"></i>Thông báo
                    <span class="nav-indicator position-absolute bottom-0 start-50 translate-middle-x"></span>
                </a>
                <a href="#" class="nav-item nav-link position-relative mx-2 px-3">
                    <i class="bi bi-chat-dots-fill me-1"></i>Liên hệ
                    <span class="nav-indicator position-absolute bottom-0 start-50 translate-middle-x"></span>
                </a>
            </div>
        </div>
          <!-- User Profile Dropdown -->
        @php
            $currentUser = session('user');
        @endphp
        <div class="nav-item dropdown ms-3">
            <a class="nav-link d-flex align-items-center profile-link" href="#" data-bs-toggle="dropdown">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . ($currentUser->Avatar ?? 'assets/img/default-avatar.png')) }}" alt="Profile"
                        class="rounded-circle user-avatar border border-2 border-light shadow-sm" width="45" height="45">
                    <span class="online-indicator position-absolute bottom-0 end-0 bg-success rounded-circle p-1 border border-white"></span>
                </div>
                <span class="d-none d-md-block dropdown-toggle ps-2 fw-medium text-dark user-name">
                    {{ $currentUser->UserName ?? Auth::user()->name ?? 'Tài khoản' }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 py-0 mt-2 overflow-hidden user-dropdown">
                <li class="dropdown-header px-4 py-3 text-center bg-light border-bottom">
                    <div class="user-avatar-wrapper mb-2">
                        <img src="{{ asset('storage/' . ($currentUser->Avatar ?? 'assets/img/default-avatar.png')) }}" alt="Profile"
                            class="rounded-circle border border-2 border-white shadow-sm" width="80" height="80">
                    </div>
                    <h6 class="mb-0 fw-bold">{{ $currentUser->UserName ?? Auth::user()->name ?? 'Tài khoản' }}</h6>
                    <small class="text-muted">{{ $currentUser->Email ?? Auth::user()->email ?? '' }}</small>
                </li>                <li>
                    <a class="dropdown-item menu-item py-2 px-4 d-flex align-items-center" href="{{ route('user-profile') }}">
                        <i class="bi bi-person-circle me-2 text-primary"></i>
                        <span>Hồ sơ cá nhân</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item menu-item py-2 px-4 d-flex align-items-center" href="{{ route('user-profile') }}">
                        <i class="bi bi-gear-fill me-2 text-primary"></i>
                        <span>Cài đặt tài khoản</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item menu-item py-2 px-4 d-flex align-items-center" href="#">
                        <i class="bi bi-question-circle-fill me-2 text-primary"></i>
                        <span>Trợ giúp</span>
                    </a>
                </li>

                <li><hr class="dropdown-divider mx-2 my-1"></li>

                <li class="p-2">
                    @auth
                        <form action="{{ route('login.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item menu-item py-2 px-4 d-flex align-items-center text-danger rounded">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                <span>Đăng xuất</span>
                            </button>
                        </form>
                    @else
                        <a class="dropdown-item menu-item py-2 px-4 d-flex align-items-center text-primary rounded" href="">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            <span>Đăng nhập</span>
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
