@extends('layouts.appCollection')

@section('title', 'Event Collections')

@section('content')
<div class="tw-container tw-mx-auto tw-px-4 tw-py-8">
    <div class="tw-flex tw-justify-between tw-items-center tw-mb-8">
        <h1 class="tw-text-3xl tw-font-bold tw-text-white">Event Collections</h1>
        <a href="{{ route('collections.index') }}" class="tw-bg-blue-500 hover:tw-bg-blue-600 tw-text-white tw-font-semibold tw-py-2 tw-px-4 tw-rounded-full tw-transition-colors">
            Back to Events
        </a>
    </div>

    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-6">
        @foreach ($events as $event)
            <div class="tw-bg-gray-800 tw-rounded-lg tw-overflow-hidden tw-shadow-lg tw-transition-all hover:tw-shadow-2xl">
                <div class="tw-aspect-w-16 tw-aspect-h-9">
                    <img src="{{ asset($event->image ?? URL::asset('images/cardPlaceholder.svg')) }}" alt="Event image" class="tw-object-cover tw-w-full tw-h-full" />
                </div>
                <div class="tw-p-6">
                    <div class="tw-flex tw-justify-between tw-items-start tw-mb-4">
                        <h2 class="tw-text-xl tw-font-semibold tw-text-white tw-mb-2">{{ $event->title }}</h2>
                    </div>
                    
                    <p class="tw-text-gray-300 tw-mb-4">{{ Str::limit($event->description, 100) }}</p>
                    
                    <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                        <span class="tw-text-sm tw-text-gray-400">{{ $event->date->format('d M, Y') }}</span>
                        <div class="tw-flex tw-items-center">
                            <span class="tw-text-sm tw-text-gray-400 tw-mr-2">Reminder</span>
                            <input 
                                type="checkbox" 
                                name="reminder" 
                                {{ $event->reminder ? 'checked' : '' }}
                                class="tw-form-checkbox tw-h-5 tw-w-5 tw-text-blue-500 tw-rounded tw-border-gray-600 tw-bg-gray-700"
                            >
                        </div>
                    </div>
                    
                    <div class="tw-flex tw-justify-end">
                        <button 
                            class="tw-bg-red-500 hover:tw-bg-red-600 tw-text-white tw-font-semibold tw-py-2 tw-px-4 tw-rounded tw-text-sm tw-transition-colors"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

