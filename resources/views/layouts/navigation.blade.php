<nav class="navbar fixed-top tw-w-full tw-top-0 tw-backdrop-blur-sm tw-shadow-lg tw-shadow-gray-800/60 tw-drop-shadow tw-transition-colors tw-duration-500 tw-bg-transparent tw-border-b tw-border-slate-300/10">
  <div class="d-flex flex-row flex-grow-1 px-3 px-md-4">
    <div class="d-flex col">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="d-flex tw-h-full tw-w-[2.0625rem]" />    
        </a>
    </div>
    <form class="d-md-flex d-none col" role="search">
        <div class="input-group rounded-pill border-0 tw-bg-slate-100/10 tw-backdrop-blur">
            <div class="rounded-start-pill tw-bg-inherit tw-h-full align-content-center border-0" id="search-icon">
                <i class="bi bi-list pe-2 ps-3"></i>
            </div>
            <input class="form-control border-0 tw-bg-inherit focus:tw-ring-0 focus:tw-bg-inherit focus:tw-shadow-none focus:tw-outline-none " list="datalistOption" type="search" placeholder="Search Bar" aria-label="Search">
            <datalist id="datalistOption">
                <option value="Event A">
                <option value="Event B">
                <option value="Event C">
                <option value="Event D">
                <option value="Event E">
            </datalist>
            <button class="btn rounded-end-pill border-0 tw-bg-inherit" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
    @if (Auth::guard('google')->check() || Auth::check())
        <div class="d-flex col align-content-center justify-content-end">
            <div class="h-100 align-content-center">
                <a href="{{ route('profile.edit') }}">
                    <i class="bi bi-person-circle fs-3"></i>
                </a>
            </div>
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical fs-4"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        <!-- Authentication -->
    @else
        <div class="d-flex col align-content-center justify-content-end">
            <button class="btn rounded-pill me-2 px-4 active:tw-outline-none tw-transition tw-ease-in-out tw-delay-100 hover:tw-scale-110 tw-duration-100">
                <a href="{{ route("register") }}">
                    {{ __("Register") }}
                </a>
            </button>
            <button class="btn rounded-pill px-4 active:tw-outline-none tw-transition tw-ease-in-out tw-delay-100 hover:tw-scale-110 tw-duration-100">
                <a href="{{ route("login") }}">
                    {{ __("Login") }}
                </a>
            </button>
        </div>
    @endif
  </div>
</nav>