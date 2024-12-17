<div class="tw-flex tw-flex-col md:tw-flex-row tw-bg-gray-800/30 tw-backdrop-blur-lg tw-rounded-lg tw-overflow-hidden tw-shadow-lg tw-transition tw-ease-out hover:tw-scale-[1.01] hover:tw-subpixel-antialiased tw-duration-200">
    <div class="tw-w-full md:tw-w-1/3">
        <img src="{{ $imageUrl ?? URL::asset('images/cardPlaceholder.svg') }}" alt="{{ $title }}" class="tw-w-full tw-h-full tw-object-cover">
    </div>
    <div class="tw-flex tw-flex-col tw-justify-between tw-p-6 tw-w-full md:tw-w-2/3">
        <div>
            <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-2">{{ $title }}</h3>
            <p class="tw-text-gray-400 tw-mb-4">{{ $description }}</p>
        </div>
        <div class="tw-flex tw-justify-between tw-items-center">
            <a href="{{ route('event.show', $eventid) }}">
                <button class="tw-bg-purple-600 hover:tw-bg-purple-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded-full tw-w-fit">
                    {{ $buttonText }}
                </button>
            </a>
            <p class="tw-font-bold tw-text-white"> {{$date->format('d M Y')}} </p>
        </div>
    </div>
</div>