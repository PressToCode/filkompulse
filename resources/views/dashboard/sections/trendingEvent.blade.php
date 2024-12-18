<!-- Trending Section -->
<section class="trending-section mx-4 py-5 tw-px-10">
    <!-- Section Title -->
    <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-white mb-3">Trending Now!</h2>
        <hr class="border-light border-2 opacity-75 w-100">
    </div>
    <!-- Slider -->
    <div data-hs-carousel='{
    "loadingClasses": "tw-opacity-0",
    "slidesQty": {
        "xs": 1,
        "lg": 3
    },
    "isDraggable": true
    }' class="tw-relative">
    <div class="hs-carousel tw-w-full tw-overflow-hidden tw-bg-transparent tw-rounded-lg">
        <div class="tw-relative tw--mx-1">
            <div class="hs-carousel-body tw-relative tw-flex tw-flex-nowrap tw-opacity-0 tw-transition-transform tw-duration-700">
                @foreach ($randomTrend as $event)
                <div class="hs-carousel-slide tw-px-1">
                    <div class="tw-flex tw-justify-center tw-h-full tw-bg-transparent tw-p-6">
                        @php
                            $firstLetter = substr($event->verified_user->user->name, 0, 1);
                            $eventID = $event->eventsID;
                        @endphp
                        <x-event-card
                            :avatar-letter="$firstLetter"
                            :organizer="$event->verified_user->user->name"
                            :organizer-role="$event->verified_user->user->name"
                            :image-url="$event->image()->first()->imageURL"
                            :title="$event->title"
                            :date-time="$event->date"
                            :location="$event->location"
                            :description="$event->description"
                            :eventId="$eventID"
                        ></x-event-card>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <button type="button" class="hs-carousel-prev hs-carousel-disabled:tw-opacity-50 hs-carousel-disabled:pointer-events-none tw-absolute tw-inset-y-0 -tw-start-10 tw-inline-flex tw-justify-center tw-items-center tw-w-[46px] tw-h-full tw-text-white tw-rounded-s-lg">
        <span class="tw-text-2xl rounded-circle tw-py-2 tw-px-2 tw-bg-[#6c5dd3]" aria-hidden="true">
        <svg class="tw-shrink-0 tw-size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"></path>
        </svg>
        </span>
        <span class="tw-sr-only">Previous</span>
    </button>
    <button type="button" class="hs-carousel-next hs-carousel-disabled:tw-opacity-50 hs-carousel-disabled:pointer-events-none tw-absolute tw-inset-y-0 -tw-end-10 tw-inline-flex tw-justify-center tw-items-center tw-w-[46px] tw-h-full tw-text-white tw-rounded-e-lg">
        <span class="tw-sr-only">Next</span>
        <span class="tw-text-2xl rounded-circle tw-py-2 tw-px-2 tw-bg-[#6c5dd3]" aria-hidden="true">
        <svg class="tw-shrink-0 tw-size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
        </span>
    </button>

    <div class="hs-carousel-pagination tw-flex tw-justify-center tw-absolute tw-bottom-3 tw-start-0 tw-end-0 tw-space-x-2"></div>
    </div>
    <!-- End Slider -->
</section>