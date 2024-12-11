<x-app-layout>
    @section('title', 'Search Events - Filkom Pulse')
    <div class="pt-5">
        <div class="pt-5"></div>
        <!-- data, total, per_page, current_page -->
        @if(isset($result))
            @foreach ($result->items() as $event)
                <h3>{{ $event['title'] }}</h3>
            @endforeach
            <div>
                {{ $result->links() }}
            </div>
        @else
            <p>No search query provided.</p>
        @endif
    </div>
</x-app-layout>