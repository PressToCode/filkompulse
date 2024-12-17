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
                        <option class="tw-bg-[#1D1B20]" value="physical" {{ old('locationtype') == 'physical' ? 'selected' : '' }}>Physical</option>
                        <option class="tw-bg-[#1D1B20]" value="online" {{ old('locationtype') == 'online' ? 'selected' : '' }}>Online</option>
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
                @foreach ($result->items() as $event)
                    <x-search-card
                        :id="$event['eventsID']"
                        :title="$event['title']"
                        :description="$event['description']"
                        :date="$event['date']" />
                @endforeach
                <div>
                    {{ $result->links('vendor.pagination.tailwind') }}
                </div>
            @else
                <p class="tw-text-5xl tw-text-center tw-font-bold tw-animate-bounce">Sorry, No Event Match Your Search <i class="bi bi-emoji-frown"></i></p>
            @endif
        </div>
    </div>
    <script>
    $(document).ready(function() {
        // Function to update events
        function updateEvents() {
            let filters = {
                category: $('#category-filter').val(),
                location_type: $('#location-filter').val(),
                date: $('#date-filter').val(),
                page: {{ request()->get('page', 1) }}
            };
    
            $.ajax({
                url: '{{ route("search.filter") }}',
                method: 'GET',
                data: filters,
                success: function(response) {
                    $('#result-container').html(response.html);
                    // Update URL with new parameters without page reload
                    // window.history.pushState({}, '', response.url);
                },
                error: function(xhr) {
                    console.error('Error fetching events:', xhr);
                }
            });
        }
    
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
