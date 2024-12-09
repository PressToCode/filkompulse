<!-- Trending Section -->
<section class="trending-section mx-4 py-5">
    <!-- Section Title -->
    <div class="text-center mb-5 mx-5 px-4">
        <h2 class="display-4 fw-bold text-white mb-3">Trending Now!</h2>
        <hr class="border-light border-2 opacity-75 w-100">
    </div>

    <!-- Carousel -->
    <div id="trendingCarousel" class="carousel slide mx-5 px-4">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Temporary for now -->
                @php
                    $events = [
                        [
                            'avatarLetter' => 'A',
                            'organizer' => 'Admin',
                            'organizerRole' => 'Administrator',
                            'imageUrl' => URL::asset("images/cardPlaceholder.svg"),
                            'title' => 'Hology 9.9',
                            'dateTime' => '14:00 | 1 October 2025',
                            'location' => 'FILKOM Auditorium G2',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                        ],
                        [
                            'avatarLetter' => 'A',
                            'organizer' => 'Event Organizer',
                            'organizerRole' => 'Verified',
                            'imageUrl' => URL::asset("images/cardPlaceholder.svg"),
                            'title' => 'Capture The Cup',
                            'dateTime' => '18:00 | 1 September 2025',
                            'location' => 'Online Via Zoom',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                        ],
                        [
                            'avatarLetter' => 'A',
                            'organizer' => 'Mr. Lorem Ipsum',
                            'organizerRole' => 'Official Partner',
                            'imageUrl' => URL::asset("images/cardPlaceholder.svg"),
                            'title' => 'Filkom Blockbuster',
                            'dateTime' => '17:00 | 1 January 2025',
                            'location' => 'Place Lorem Ipsum Dolor',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                        ],
                        // Add more events here if needed
                    ];
                    $totalEvents = count($events);
                    $itemsPerSlide = [
                        'col-12 col-md-6 col-lg-4' => 3,
                        'col-12 col-sm-6' => 2,
                        'col-12' => 1,
                    ];
                @endphp
                @foreach ($itemsPerSlide as $colClass => $itemCount)
                    @for ($i = 0; $i < $totalEvents; $i += $itemCount)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row g-4">
                                @for ($j = $i; $j < min($i + $itemCount, $totalEvents); $j++)
                                    <div class="{{ $colClass }}">
                                        <x-event-card 
                                            :avatar-letter="$events[$j]['avatarLetter']"
                                            :organizer="$events[$j]['organizer']"
                                            :organizer-role="$events[$j]['organizerRole']"
                                            :image-url="$events[$j]['imageUrl']"
                                            :title="$events[$j]['title']"
                                            :date-time="$events[$j]['dateTime']"
                                            :location="$events[$j]['location']"
                                            :description="$events[$j]['description']"
                                        />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                @endforeach
            </div>
        </div>

        <!-- Custom Carousel Controls -->
        <button class="carousel-control-prev carousel-custom-control" type="button" data-bs-target="#trendingCarousel" data-bs-slide="prev">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="carousel-control-next carousel-custom-control" type="button" data-bs-target="#trendingCarousel" data-bs-slide="next">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</section>
<style>
    .trending-section {
        background-color: transparent;
    }

    .event-card {
        background-color: #1a1a1a;
    }

    .btn-purple {
        background-color: #6c5dd3;
        color: white;
        border: none;
    }

    .btn-purple:hover {
        background-color: #5a4eb8;
        color: white;
    }

    .avatar {
        background-color: #6c5dd3;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
        background-color: #6c5dd3;
        border-radius: 50%;
        opacity: 1;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-control-prev {
        left: -50px;
    }

    .carousel-control-next {
        right: -50px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: #5a4eb8;
    }

    @media (max-width: 768px) {
        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carousel = new bootstrap.Carousel(document.getElementById('trendingCarousel'), {
            interval: false // Disable auto-sliding
        });
    });
</script>