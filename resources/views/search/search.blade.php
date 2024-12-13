<x-app-layout>
    @section('title', 'Search Events - Filkom Pulse')
    <div class="pt-5 pb-3">
        <div class="pt-5 px-5">
            <!-- data, total, per_page, current_page -->
            @if(!empty($result->items()))
            <p class="tw-text-5xl tw-text-center tw-font-bold py-3">Your Search Result:</p>
                @foreach ($result->items() as $event)
                    <x-search-card
                        :id="$event['id']"
                        :title="$event['title']"
                        :description="$event['description']"
                        :date="$event['date']" />
                @endforeach
                <div>
                    {{ $result->links() }}
                </div>
            @else
                <p class="tw-text-5xl tw-text-center tw-font-bold tw-animate-bounce">Sorry, No Event Match Your Search <i class="bi bi-emoji-frown"></i></p>
            @endif
        </div>
    </div>
</x-app-layout>