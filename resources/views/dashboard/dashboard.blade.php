<x-app-layout>
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
        transition: transform 0.3s ease; 
        transform: scale(1.05);
    }
</style>

<style>
/* Dark theme and general styles */
.trending-section {
  background-color: transparent;
}

.event-card {
  background-color: #1a1a1a;
  border-radius: 12px;
  padding: 1.5rem;
  height: 100%;
  color: white;
}

/* Avatar styling */
.avatar {
  width: 40px;
  height: 40px;
  background-color: #6c5dd3;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: white;
}

/* Text styles */
.event-title {
  font-size: 1.25rem;
  font-weight: bold;
  color: white;
}

.event-time {
  color: #9ca3af;
  font-size: 0.875rem;
}

.event-description {
  color: #d1d5db;
  font-size: 0.875rem;
}

/* Button styling */
.btn-purple {
  background-color: #6c5dd3;
  color: white;
  border: none;
}

.btn-purple:hover {
  background-color: #5a4eb8;
  color: white;
}

/* Custom carousel controls */
.carousel-custom-control {
  width: 40px;
  height: 40px;
  background-color: #6c5dd3;
  border-radius: 50%;
  opacity: 1;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}

.carousel-custom-control:hover {
  background-color: #5a4eb8;
}

.carousel-control-prev {
  left: -50px;
}

.carousel-control-next {
  right: -50px;
}

.carousel-custom-control i {
  color: white;
  font-size: 1.25rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .carousel-custom-control {
    display: none;
  }
  
  .event-card {
    margin-bottom: 1rem;
  }
}
</style>