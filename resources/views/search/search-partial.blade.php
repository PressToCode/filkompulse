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