@extends('layouts.appCollection')

@section('title', 'Event Collections')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Event Collections</h1>
        <a href="{{ route('events.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full transition-colors">
            Back to Events
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($events as $event)
            <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-all hover:shadow-2xl">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ asset($event->image ?? URL::asset('images/cardPlaceholder.svg')) }}" alt="Event image" class="object-cover w-full h-full" />
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-xl font-semibold text-white mb-2">{{ $event->title }}</h2>
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="selected_events[]" 
                                value="{{ $event->id }}"
                                class="form-checkbox h-5 w-5 text-blue-500 rounded border-gray-600 bg-gray-700"
                            >
                        </div>
                    </div>
                    
                    <p class="text-gray-300 mb-4">{{ Str::limit($event->description, 100) }}</p>
                    
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-400">{{ $event->date->format('d M, Y') }}</span>
                        <div class="flex items-center">
                            <span class="text-sm text-gray-400 mr-2">Reminder</span>
                            <input 
                                type="checkbox" 
                                name="reminder" 
                                {{ $event->reminder ? 'checked' : '' }}
                                class="form-checkbox h-5 w-5 text-blue-500 rounded border-gray-600 bg-gray-700"
                            >
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <button 
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded text-sm transition-colors"
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

