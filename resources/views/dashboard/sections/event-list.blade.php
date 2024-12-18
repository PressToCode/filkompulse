<section class="tw-py-12 tw-px-4 md:tw-px-6 lg:tw-px-20">
    <div class="tw-max-w-7xl tw-mx-auto">
        <!-- Header -->
        <div class="tw-mb-8">
            <h1 class="tw-text-4xl tw-font-bold tw-text-white tw-mb-2">Find Events</h1>
            <p class="tw-text-gray-400">Search based on preferences</p>
        </div>

        <!-- Filters -->
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4 tw-mb-8">
            <!-- Category Dropdown -->
            <div id="category-container">
                <div class="tw-flex tw-space-x-2 tw-mb-2">
                    <select id="category-filter" name="category" class="filter tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-bg-transparent tw-border-b-2 tw-border-t-0 tw-border-l-0 tw-border-r-0 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600" required>
                        <option class="tw-bg-[#1D1B20]" value="" disabled selected>Category</option>
                        @foreach ($categories as $category)
                            @php
                                $name = $category->categoryName;
                            @endphp
                            <option class="tw-bg-[#1D1B20]" value="{{$name}}" {{ old('category') == $name ? 'selected' : '' }}>{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Location Type Dropdown -->
            <div id="location-container">
                <div class="tw-flex tw-space-x-2 tw-mb-2">
                    <select id="location-filter" name="locationtype" class="filter tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-bg-transparent tw-border-b-2 tw-border-t-0 tw-border-l-0 tw-border-r-0 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600">
                        <option class="tw-bg-[#1D1B20]" value="" disabled selected>Location Type</option>
                        <option class="tw-bg-[#1D1B20]" value="Offline" {{ old('locationtype') == 'Offline' ? 'selected' : '' }}>Offline</option>
                        <option class="tw-bg-[#1D1B20]" value="Online" {{ old('locationtype') == 'Online' ? 'selected' : '' }}>Online</option>
                    </select>
                </div>
            </div>

            <!-- Date Picker -->
            <div class="tw-relative">
                <x-text-input type="date" id="date-filter" class="tw-w-full tw-block tw-mt-1 tw-bg-transparent tw-border-b-2 tw-border-t-0 tw-border-l-0 tw-border-r-0" />
            </div>
        </div>

        
        <!-- Events Grid -->
        <div id="events-container" class="tw-grid tw-gap-6">
            <!-- Pagination -->
            <div class="">
                {{ $events->links('vendor.pagination.customPagination') }}
            </div>
            @foreach($events as $event)
                <x-dashboard-event-card 
                    :image-url="$event->image()->first()->imageURL"
                    :title="$event->title"
                    :description="$event->description"
                    :button-text="'View Details'"
                    :eventid="$event->eventsID"
                    :date="$event->date"
                />
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
$(document).ready(function() {
    // Function to update events
    function updateEvents(url = null) {
        let filters = {
            category: $('#category-filter').val(),
            location_type: $('#location-filter').val(),
            date: $('#date-filter').val(),
        };

        // If a pagination URL is provided, use it directly without adding filters
        // Otherwise use the filter route with filters
        let requestUrl = url || '{{ route("dashboard.filter") }}';
        let requestData = url ? {} : filters; // Only send filters if not using pagination URL

        $.ajax({
            url: requestUrl,
            method: 'GET',
            data: requestData,
            success: function(response) {
                $('#events-container').html(response.html);
                // Update URL with new parameters without page reload
                window.history.pushState({}, '', response.url);

                // Reattach pagination click handlers after content update
                attachPaginationHandlers();
            },
            error: function(xhr) {
                console.error('Error fetching events:', xhr);
            }
        });
    }

    // Function to attach pagination click handlers
    function attachPaginationHandlers() {
        $('#events-container').find('.pagination a').on('click', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            updateEvents(url);
        });
    }

    $(document).on('click', '.pagination-link', function(e) {
        e.preventDefault(); // Prevent default link behavior
        let url = $(this).attr('href');
        updateEvents(url);
    });

    // Initial attachment of pagination handlers
    attachPaginationHandlers();

    // Event listeners for filters
    $('.filter').change(function() {
        updateEvents();
    });

    $('#date-filter').change(function() {
        updateEvents();
    });
});
</script>
@endpush