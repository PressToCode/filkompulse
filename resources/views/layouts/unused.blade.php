<!-- Navigation -->
<div class="tw-flex-1">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="tw-h-full tw-w-auto tw-border" />
        </a>
    </div>
    <form class="tw-flex-1 tw-flex tw-items-center tw-space-x-2" role="search">
        <div class="tw-flex tw-items-center tw-w-full tw-bg-gray-700 tw-rounded-full tw-border-0">
            <div class="tw-flex tw-items-center tw-pl-3" id="search-icon">
                <i class="bi bi-list tw-text-white"></i>
            </div>
            <input class="tw-form-control tw-w-full tw-bg-gray-700 tw-text-white tw-border-0 tw-rounded-full tw-px-4 tw-py-2" list="datalistOption" type="search" placeholder="Search Bar" aria-label="Search">
            <datalist id="datalistOption">
                <option value="Event A">
                <option value="Event B">
                <option value="Event C">
                <option value="Event D">
                <option value="Event E">
            </datalist>
            <button class="tw-btn tw-bg-transparent tw-text-white tw-rounded-full tw-px-4 tw-py-2" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
    @if (Auth::check())
        <div class="tw-flex tw-items-center tw-space-x-4">
            <div class="tw-h-10">
                <a href="{{ route('profile.edit') }}">
                    <i class="bi bi-person-circle tw-text-white tw-text-3xl"></i>
                </a>
            </div>
            <div class="tw-relative">
                <button class="tw-text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical tw-text-white tw-text-xl"></i>
                </button>
                <ul class="tw-dropdown-menu tw-absolute tw-right-0 tw-bg-white tw-shadow-lg tw-rounded-lg tw-mt-2 tw-w-48">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        this.closest('form').submit();" class="tw-dropdown-item tw-text-black tw-px-4 tw-py-2">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                    <li><a class="tw-dropdown-item tw-text-black tw-px-4 tw-py-2" href="#">Another action</a></li>
                    <li><a class="tw-dropdown-item tw-text-black tw-px-4 tw-py-2" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    @else
        <div class="tw-flex tw-items-center tw-space-x-4">
            <button class="tw-bg-indigo-600 tw-text-white tw-rounded-full tw-px-4 tw-py-2 tw-hover:bg-indigo-700">
                <a href="{{ route('register') }}">
                    {{ __("Register") }}
                </a>
            </button>
            <button class="tw-bg-indigo-600 tw-text-white tw-rounded-full tw-px-4 tw-py-2 tw-hover:bg-indigo-700">
                <a href="{{ route('login') }}">
                    {{ __("Login") }}
                </a>
            </button>
        </div>
    @endif

<!-- Dashboard -->
<x-slot:header>
        <div class="d-flex vh-100 pt-5">
            <div class="d-flex flex-grow-1 h-100 pt-3">
                <div class="d-flex col-6 row align-content-center">
                    <h1 class="d-flex fs-1 fw-bolder justify-content-center fadeInAnimation">Search Nearest<br>Event Easily!</h1>
                    <div class="d-flex flex-row align-content-center justify-content-center pt-2 pe-5 fadeInAnimation" style="animation-delay: 1s;">
                        <div class="d-flex flex-column pt-1">
                            <i class="bi bi-diamond-fill" style="margin-bottom: -1em; font-size: 1dvw;"></i>
                            <div class="d-flex flex-grow-1 justify-content-center">
                                <span class="d-flex justify-self-center vr px-0" style="background: linear-gradient(to bottom, white, transparent);"></span>
                            </div>
                        </div>
                        <div class="d-grid ps-3 text-light gap-0 row-gap-3">
                            <p>Search for the Newest and <br> Trending Upcoming Events</p>
                            <p>Be Verified and Host your <br> own events! </p>
                            <p>Chat Forum and More! </p>
                            <button class="btn btn-outline-light popout">
                                <a href="">
                                    {{ __('Find Events') }}
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-6 h-100 align-self-center justify-content-center overflow-hidden fadeInNoAnimation" 
                style="
                    background-image: url({{URL::asset('/images/heroImageGlow.svg')}}); 
                    background-size: 100% 100%;
                    background-position: center;
                    background-repeat: no-repeat;
                ">
                    <img src="{{URL::asset('/images/heroImageDevice.png')}}" class="img-fluid w-75 object-fit-scale popout" alt="">
                </div>
            </div>
        </div>
    </x-slot:header>
    @include('dashboard.sections.trendingEvent')