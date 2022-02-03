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
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto mt-1">
                <!-- Authentication Links -->
                <li class="nav-item dropdown dropstart">
                    <a class="nav-link"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <span>
                            <svg class="text-gray-700"
                                wight="26" height="26"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                            </svg>
                        </span>
                    </a>

                    <span class="notification-dot"></span>

                    <ul class="dropdown-menu me-n5 mt-5 border-0 rounded-6 bg-white shadow mt-2" style="width: 300px;">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropstart mr-2">
                    <a id="navbarDropdown"
                        class="nav-link"
                        href="#"
                        data-bs-auto-close="true"
                        data-bs-display="static"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <span>
                            <svg class="text-gray-700"
                                wight="26" height="26"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                    </a>

                    <ul class="dropdown-menu me-n5 mt-5 border-0 rounded-6 bg-white shadow mt-2" aria-labelledby="navbarDropdown" style="width: 300px;">
                        {{-- <div class="px-3 mb-1">
                            <span class="font-weight-bold">{{ current_user()->username }}</span>
                            <span>{{ current_user()->email }}</span>
                        </div> --}}

                            {{-- <a class="dropdown-item mt-2" href="{{ route('profile.show', current_user()->username) }}">
                                Tu perfil
                            </a> --}}

                        <div class="dropdown-divider"></div>
                    </ul>
                </li>

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

