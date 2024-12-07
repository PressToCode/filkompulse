<nav class="navbar bg-dark fixed-top border" style="height: calc(100%/10);">
  <div class="d-flex flex-row flex-grow-1 px-2 px-md-3 h-100">
    <div class="d-flex col">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="h-100 w-auto" />    
        </a>
    </div>
    <form class="d-flex col-6" role="search">
        <div class="input-group rounded-pill border-0 bg-secondary">
            <div class="rounded-start-pill align-self-center" id="search-icon">
                <i class="bi bi-list pe-2 ps-3"></i>
            </div>
            <input class="form-control border-0 bg-secondary" list="datalistOption" type="search" placeholder="Search Bar" aria-label="Search">
            <datalist id="datalistOption">
                <option value="Event A">
                <option value="Event B">
                <option value="Event C">
                <option value="Event D">
                <option value="Event E">
            </datalist>
            <button class="btn rounded-end-pill border-0" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
    @if (Auth::check())
        <div class="d-flex col align-content-center justify-content-end">
            <div class="h-100 align-content-center">
                <a href="{{ route('profile.edit') }}">
                    <i class="bi bi-person-circle fs-4"></i>
                </a>
            </div>
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
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
            <button class="btn rounded-pill me-2 px-4 authBtn">
                <a href="{{ route("register") }}">
                    {{ __("Register") }}
                </a>
            </button>
            <button class="btn rounded-pill px-4 authBtn">
                <a href="{{ route("login") }}">
                    {{ __("Login") }}
                </a>
            </button>
        </div>
    @endif
  </div>
</nav>

<style>
    input.form-control:focus {
        box-shadow: none !important;
        outline: none !important;
    }

    .authBtn {
        background-color: #65558F;

        &:hover {
            background-color: #65558F !important;
        }
    }
</style>