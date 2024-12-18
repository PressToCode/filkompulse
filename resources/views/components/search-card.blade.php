@props(['id', 'title', 'description', 'date', 'image'])

<a href="{{env('APP_URL', 'filkompulse.dev')."/"}}event/{{ $id }}" class="tw-grid tw-grid-cols-10 overflow-hidden tw-rounded-md tw-mb-5 tw-transition tw-ease-out hover:tw-scale-105 tw-duration-200 tw-bg-gray-800/50">
    <div class="tw-col-span-3 tw-flex tw-flex-initial tw-shrink tw-grow-0 tw-max-h-full tw-overflow-hidden tw-object-cover">
    <img src="{{ $image ?? URL::asset('images/cardPlaceholder.svg') }}" class="tw-w-full tw-h-auto max-md:tw-h-full tw-object-cover tw-overflow-hidden" alt="Event image">
    </div>
    <div class="tw-flex tw-flex-col tw-col-span-7 tw-py-2 tw-px-5">
        <h3 class="tw-flex tw-flex-initial tw-text-xl">{{ $title }}</h3>
        <p class="tw-flex tw-flex-auto tw-text-justify">{{ $description }}</p>
        <p class="tw-flex tw-flex-initial">{{ $date->format('d F Y') }}</p>
    </div>
</a>