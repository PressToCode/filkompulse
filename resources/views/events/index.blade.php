@extends('layouts.appCollection')

@section('title', 'Event Collections')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold">Collections</h1>
        <a href="{{ route('events.index') }}" class="btn btn-outline-primary bg-blue-500 hover:bg-blue-600 text-white">Go Back</a>
    </div>

    <div class="grid grid-cols-12 gap-4 mb-4 px-4">
        <div class="col-span-6 md:col-span-7">
            <h2 class="text-lg font-semibold text-gray-300">Events</h2>
        </div>
        <div class="col-span-2 md:col-span-2 text-center">
            <span class="px-3 py-1 bg-red-500 rounded text-sm">DELETE</span>
        </div>
        <div class="col-span-2 md:col-span-2 text-center">
            <span class="text-gray-300">Date</span>
        </div>
        <div class="col-span-2 md:col-span-1 text-center">
            <span class="text-gray-300">Reminder</span>
        </div>
    </div>

    @foreach ($events as $event)
        @include('components.event-cardCollection', ['event' => $event])
    @endforeach
@endsection

