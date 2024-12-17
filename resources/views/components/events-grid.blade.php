@foreach($events as $event)
    <x-dashboard-event-card 
        :image-url="$event->image_url"
        :title="$event->title"
        :description="$event->description"
        :button-text="'View Details'"
    />
@endforeach