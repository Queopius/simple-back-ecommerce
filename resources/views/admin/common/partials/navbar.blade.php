@auth
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="height: 60px;">
    <div class="container-fluid ms-2 px-0 px-xl-3">
        <a class="navbar-brand d-inline-block ms-lg-0 pe-lg-2 me-lg-4" href="{{ url('/') }}">
            <img src="/uploads/logo/bootstrap-solid.svg"
                width="30"
                height="30"
                alt=""
            >
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler me-2"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-label="{{ __('Toggle navigation') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mt-1">
                <li>
                    <x-links
                        route="{{ route('admin.users') }}"
                        title="User list"
                    />
                </li>
                <li>
                    <x-links
                        route="{{ route('admin.products') }}"
                        title="Product list"
                    />
                </li>
                <li>
                    <x-links
                        route="{{ route('admin.categories') }}"
                        title="Category list"
                    />
                </li>
                <li>
                    <x-links
                        route="#"
                        title="Review list"
                    />
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto mt-1">
                <!-- Authentication Links -->
                <li class="nav-item dropdown dropstart">
                    <a class="nav-link"
                        href="#"
                        id="navbarDropdownMenuLink"
                        data-bs-auto-close="true"
                        data-bs-display="static"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <x-navbar.avatar size="32" class="shadow" />
                    </a>
                    <ul class="dropdown-menu me-n5 mt-5 border-0 rounded-6 bg-white shadow mt-2"
                        aria-labelledby="navbarDropdown"
                    >
                        <div class="px-4 py-2">
                            <span class="font-weight-bold">
                                {{ current_user()->username }}
                            </span>
                            <span>
                                {{ current_user()->email }}
                            </span>
                        </div>

                            {{-- <a class="dropdown-item mt-2" href="{{ route('profile.show', current_user()->username) }}">
                                {{ trans('You Profile') }}
                            </a> --}}

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item px-4" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <span>
                                <svg width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                    <path d="M7 12h14l-3 -3m0 6l3 -3" />
                                </svg>
                            </span>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@endauth

