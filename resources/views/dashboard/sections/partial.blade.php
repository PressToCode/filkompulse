@if (isset($events))
    @if ($events)
        {{ \Log::info($events) }}
        <div>
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
    @endif
@else
    <p>SOMETHING WENT WRONG</p>
@endif
