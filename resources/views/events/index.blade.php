@extends('layouts.appCollection')

@section('title', 'Event Collections')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold">Collections</h1>
        <a href="{{ route('events.index') }}" class="btn btn-outline-primary bg-blue-500 hover:bg-blue-600 text-white">Go Back</a>
    </div>

    <div class="grid grid-cols-12 gap-4 mb-4 px-4">
        <div class="col-span-12">
            <h2 class="text-lg font-semibold text-gray-300">Events</h2>
        </div>
    </div>

    @foreach ($events as $event)
        <div class="grid grid-cols-12 gap-4 bg-gray-800 p-4 rounded-lg mb-4">
            <!-- Event Details -->
            <div class="col-span-9">
                @include('components.event-cardCollection', ['event' => $event])
            </div>

            <!-- Right Column: Actions & Info -->
            <div class="col-span-3 flex flex-col items-end space-y-2">
                <span class="px-3 py-1 bg-red-500 rounded text-sm text-white cursor-pointer">DELETE</span>
                <span class="text-sm text-gray-300">{{ $event->date->format('d M, Y') }}</span>
                <span class="text-sm text-gray-300">{{ $event->reminder ? 'On' : 'Off' }}</span>
            </div>
        </div>
    @endforeach
@endsection
