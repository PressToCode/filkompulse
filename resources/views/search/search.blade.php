<x-app-layout>
    @section('title', 'Search Events - Filkom Pulse')
    <div class="pt-5 pb-3">
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4 tw-mb-8 pt-5 px-5">
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
        <div id="result-container" class="px-5">
            <!-- data, total, per_page, current_page -->
            @if(!empty($result->items()))
            <p class="tw-text-5xl tw-text-center tw-font-bold py-3">Your Search Result:</p>
                <div class="tw-pb-5">
                    {{ $result->links('vendor.pagination.tailwind') }}
                </div>
                @foreach ($result->items() as $event)
                    @php
                        $eventImage = $event->image()->first();
                        $imageURL = $eventImage ? $eventImage->imageURL : null;
                    @endphp
                    <x-search-card
                        :id="$event['eventsID']"
                        :title="$event['title']"
                        :description="$event['description']"
                        :date="$event['date']"
                        :image="$imageURL" />
                @endforeach
            @else
                <p class="tw-text-5xl tw-text-center tw-font-bold tw-animate-bounce">Sorry, No Event Match Your Search <i class="bi bi-emoji-frown"></i></p>
            @endif
        </div>
    </div>
    <script>
    $(document).ready(function() {
        // Function to update events
        function updateEvents(url = null) {
            let filters = {
                q: new URLSearchParams(window.location.search).get('q'), // Get search query from URL
                category: $('#category-filter').val(),
                location_type: $('#location-filter').val(),
                date: $('#date-filter').val(),
            };

            // If a pagination URL is provided, use it directly
            let requestUrl = url || '{{ route("search.filter") }}';
            // Add the filters to the URL if it's a pagination request
            if (url) {
                // Create URL object to handle query parameters
                let urlObj = new URL(url);
                // Add current filters to pagination URL
                if (filters.category) urlObj.searchParams.set('category', filters.category);
                if (filters.location_type) urlObj.searchParams.set('location_type', filters.location_type);
                if (filters.date) urlObj.searchParams.set('date', filters.date);
                requestUrl = urlObj.toString();
            }

            $.ajax({
                url: requestUrl,
                method: 'GET',
                headers: {
                'X-Requested-With': 'XMLHttpRequest'
                },
                data: url ? {} : filters,
                success: function(response) {
                    console.log(response);
                    $('#result-container').html(response.html);
                    // Update URL without page reload
                    window.history.pushState({}, '', response.url);
                },
                error: function(xhr) {
                    console.error('Error fetching events:', xhr);
                }
            });
        }

        // Event delegation for pagination links
        $(document).on('click', '.pagination-link', function(e) {
            e.preventDefault();
            let url = $(this).attr('href')
            let urlObject = new URL(url);
            let pageValue = urlObject.searchParams.get('page');
            if (url.includes('search')) { 
                url = $(this).attr('href').replace(/search\?page=\d+/, `search/filter?page=${pageValue}`);
            } else { 
                url = $(this).attr('href').replace(/\?page=\d+/, `?page=${pageValue}`);
            }
            console.log(url);
            updateEvents(url);
        });

        // Event listeners for filters
        $('.filter').change(function() {
            updateEvents();
        });

        $('#date-filter').change(function() {
            updateEvents();
        });
    });
    </script>
</x-app-layout>
