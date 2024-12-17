<section class="tw-py-12 tw-px-4 md:tw-px-6 lg:tw-px-8">
    <div class="tw-max-w-7xl tw-mx-auto">
        <!-- Header -->
        <div class="tw-mb-8">
            <h1 class="tw-text-4xl tw-font-bold tw-text-white tw-mb-2">Find Events</h1>
            <p class="tw-text-gray-400">Search based on preferences</p>
        </div>

        <!-- Filters -->
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4 tw-mb-8">
            <!-- Category Dropdown -->
            <div class="hs-dropdown tw-relative">
                <button id="category-filter" type="button" class="hs-dropdown-toggle tw-w-full tw-bg-gray-800 tw-text-left tw-text-white tw-rounded-lg tw-px-4 tw-py-3 tw-flex tw-justify-between tw-items-center">
                    <span>Category</span>
                    <svg class="tw-w-4 tw-h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="hs-dropdown-menu tw-hidden tw-bg-gray-800 tw-rounded-lg tw-mt-2 tw-w-full">
                    @foreach($categories as $category)
                        <a class="tw-block tw-px-4 tw-py-2 tw-text-white hover:tw-bg-gray-700" href="#" data-value="{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Location Type Dropdown -->
            <div class="hs-dropdown tw-relative">
                <button id="location-filter" type="button" class="hs-dropdown-toggle tw-w-full tw-bg-gray-800 tw-text-left tw-text-white tw-rounded-lg tw-px-4 tw-py-3 tw-flex tw-justify-between tw-items-center">
                    <span>Location Type</span>
                    <svg class="tw-w-4 tw-h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="hs-dropdown-menu tw-hidden tw-bg-gray-800 tw-rounded-lg tw-mt-2 tw-w-full">
                    <a class="tw-block tw-px-4 tw-py-2 tw-text-white hover:tw-bg-gray-700" href="#" data-value="online">Online</a>
                    <a class="tw-block tw-px-4 tw-py-2 tw-text-white hover:tw-bg-gray-700" href="#" data-value="offline">Offline</a>
                    <a class="tw-block tw-px-4 tw-py-2 tw-text-white hover:tw-bg-gray-700" href="#" data-value="hybrid">Hybrid</a>
                </div>
            </div>

            <!-- Date Picker -->
            <div class="tw-relative">
                <input type="date" id="date-filter" class="tw-w-full tw-bg-gray-800 tw-text-white tw-rounded-lg tw-px-4 tw-py-3">
            </div>
        </div>

        <!-- Events Grid -->
        <div id="events-container" class="tw-grid tw-gap-6">
            @foreach($events as $event)
                <x-dashboard-event-card 
                    :image-url="$event->image_url"
                    :title="$event->title"
                    :description="$event->description"
                    :button-text="'View Details'"
                />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="tw-mt-8">
            {{ $events->links('vendor.pagination.customPagination') }}
        </div>
    </div>
</section>

@push('scripts')
<script>
$(document).ready(function() {
    // Function to update events
    function updateEvents() {
        let filters = {
            category: $('#category-filter').data('selected'),
            location_type: $('#location-filter').data('selected'),
            date: $('#date-filter').val(),
            page: {{ request()->get('page', 1) }}
        };

        $.ajax({
            url: '{{ route("dashboard.filter") }}',
            method: 'GET',
            data: filters,
            success: function(response) {
                $('#events-container').html(response.html);
                // Update URL with new parameters without page reload
                window.history.pushState({}, '', response.url);
            },
            error: function(xhr) {
                console.error('Error fetching events:', xhr);
            }
        });
    }

    // Event listeners for filters
    $('.hs-dropdown-menu a').click(function(e) {
        e.preventDefault();
        const value = $(this).data('value');
        const dropdown = $(this).closest('.hs-dropdown');
        dropdown.find('.hs-dropdown-toggle span').text($(this).text());
        dropdown.find('.hs-dropdown-toggle').data('selected', value);
        updateEvents();
    });

    $('#date-filter').change(function() {
        updateEvents();
    });

    // Initialize Preline dropdown
    HSDropdown.init();
});
</script>
@endpush