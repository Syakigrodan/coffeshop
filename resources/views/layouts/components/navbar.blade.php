<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->fullname }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->position->position_name }}
                                </p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('back-end/assets/compiled/jpg/1.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    @if(Auth::user()->position->position_name == 'Manager')
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem">
                        <li>
                            <form action="{{ route('manager-logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                    @elseif(Auth::user()->position->position_name == 'Admin')
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem">
                        <li>
                            <form action="{{ route('admin-logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                    @elseif(Auth::user()->position->position_name == 'Cashier')
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem">
                        <li>
                            <form action="{{ route('cashier-logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
