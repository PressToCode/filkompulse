@extends('layouts.appCollection')

@section('title', 'Event Collections')

@section('content')
<div class="tw-container tw-mx-auto tw-px-4 tw-py-8 tw-pt-20">
    <div class="tw-flex tw-justify-between tw-items-center tw-mb-8">
        <h1 class="tw-text-3xl tw-font-bold tw-text-white">Event Collections</h1>
        <a href="{{ route('collections.index') }}" class="tw-bg-blue-500 hover:tw-bg-blue-600 tw-text-white tw-font-semibold tw-py-2 tw-px-4 tw-rounded-full tw-transition-colors">
            Back to Events
        </a>
    </div>

    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-6">
        @foreach ($events as $event)
            <div class="tw-bg-gray-800 tw-rounded-lg tw-overflow-hidden tw-shadow-lg tw-transition-all hover:tw-shadow-2xl tw-grid tw-grid-cols-10 md:tw-grid-cols-1">
                <div class="tw-aspect-w-16 tw-aspect-h-9 tw-col-span-4 md:tw-col-auto">
                    <img src="{{ asset($event->image()->first() ?? URL::asset('images/cardPlaceholder.svg')) }}" alt="Event image" class="tw-object-cover tw-w-full tw-h-full" />
                </div>
                <div class="tw-p-6 tw-col-span-6 md:tw-col-auto">
                    <div class="tw-flex tw-justify-between tw-items-start tw-mb-4">
                        <h2 class="tw-text-xl tw-font-semibold tw-text-white tw-mb-2">{{ $event->title }}</h2>
                    </div>
                    
                    <p class="tw-text-gray-300 tw-mb-4">{{ Str::limit($event->description, 100) }}</p>
                    
                    <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                        <span class="tw-text-sm tw-text-gray-400">{{ $event->date->format('d M, Y') }}</span>
                    </div>
                    
                    <div class="tw-flex tw-flex-wrap tw-justify-end tw-gap-4">
                        <button 
                            class="tw-bg-green-400 hover:tw-bg-green-500 tw-text-white tw-font-semibold tw-py-2 tw-px-4 tw-rounded tw-text-sm tw-transition-colors tw-flex tw-flex-grow tw-justify-center"
                        >
                            Check
                        </button>
                        <div class="tw-flex tw-flex-grow tw-flex-wrap tw-gap-4">
                            <button 
                                class="tw-bg-yellow-500 hover:tw-bg-yellow-600 tw-text-white tw-font-semibold tw-py-2 tw-px-4 tw-rounded tw-text-sm tw-transition-colors tw-flex tw-flex-auto tw-justify-center"
                            >
                                Remind
                            </button>
                            <button 
                                class="tw-bg-red-500 hover:tw-bg-red-600 tw-text-white tw-font-semibold tw-py-2 tw-px-4 tw-rounded tw-text-sm tw-transition-colors tw-flex tw-flex-auto tw-justify-center"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

