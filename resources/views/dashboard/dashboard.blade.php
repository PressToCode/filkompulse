<x-app-layout class="tw-bg-gradient-to-b tw-from-[#1D1B20] tw-via-black tw-to-[#797186]">
    @section('title', 'Filkom Pulse - Homepage')
    <x-slot:header>
        <div class="tw-flex tw-h-dvh">
            <div class="d-flex flex-column flex-md-row flex-grow-1">
                <div class="d-flex order-2 order-md-1 col col-md-6 row align-content-center fadeInAnimation">
                    <h1 class="d-flex fs-1 fw-bolder justify-content-center text-center text-md-start popout">Search Nearest<br>Event Easily!</h1>
                    <div class="d-flex flex-row align-content-center justify-content-center pt-2 pe-md-5 pe-0 fadeInAnimation" style="animation-delay: 1s;">
                        <div class="d-md-flex d-none flex-column pt-1">
                            <i class="bi bi-diamond-fill" style="margin-bottom: -1em; font-size: 1dvw;"></i>
                            <div class="d-flex flex-grow-1 justify-content-center">
                                <span class="d-flex justify-self-center vr px-0" style="background: linear-gradient(to bottom, white, transparent);"></span>
                            </div>
                        </div>
                        <div class="d-grid ps-md-3 text-light gap-0 row-gap-3 text-center text-md-start justify-self-center align-self-center">
                            <p class="popout">Search for the Newest and <br> Trending Upcoming Events</p>
                            <p class="popout">Be Verified and Host your <br> own events! </p>
                            <p class="popout">Chat Forum and More! </p>
                            <button class="btn btn-outline-light popout">
                                <a href="{{ route('search') }}">
                                    {{ __('Find Events') }}
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-grow-1 order-1 order-md-2 mt-5 mt-md-0 col col-md-6 md:tw-h-full align-self-center justify-content-center overflow-hidden fadeInNoAnimation" 
                style="
                    background-image: url({{URL::asset('/images/heroImageGlow.svg')}}); 
                    background-size: contain;
                    background-position: center;
                    background-repeat: no-repeat;
                ">
                    <img src="{{URL::asset('/images/heroImageDevice.png')}}" class="img-fluid w-75 object-fit-scale tw-transition tw-ease-out hover:tw-scale-110 tw-duration-200" alt="">
                </div>
            </div>
        </div>
    </x-slot:header>
    @include('dashboard.sections.trendingEvent')
    @include('dashboard.sections.event-list')
    @stack('scripts')
</x-app-layout>
<style>
    @keyframes fadeUptoDown {
        0% {
            opacity: 0;
            transform: translateY(-30px); /* Start from above */
        }
        100% {
            opacity: 1;
            transform: translateY(0); /* End at the normal position */
        }
    }

    .fadeInAnimation {
        opacity: 0;
        animation: fadeUptoDown 1s ease-out forwards;
    }

    @keyframes fadeToVisible {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .fadeInNoAnimation {
        opacity: 0;
        animation: fadeToVisible 1s ease forwards;
    }

    .popout:hover {
        transition: transform 0.3s ease-out; 
        transform: scale(1.05);
    }
</style>
<!-- Commit Purposes lmao -->