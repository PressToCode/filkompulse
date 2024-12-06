<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Main Event Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold mb-2">LOMBA E-SPORT</h1>
                <h2 class="text-xl mb-4">MOBILE LEGEND</h2>
            </div>
            
            <div class="relative mb-4">
                <img src="{{ URL::asset('images/cardPlaceholder.svg') }}" alt="Event Image" class="w-full h-64 object-cover rounded-lg cursor-pointer">
            </div>
            
            <div class="flex flex-wrap gap-4 mb-4">
                <span class="bg-gray-100 px-4 py-2 rounded-full text-sm">Location: Online</span>
                <span class="bg-gray-100 px-4 py-2 rounded-full text-sm">Date: 25 Dec 2023</span>
                <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">More</button>
            </div>
            
            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-bold mb-4">ABOUT</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
        </div>

        <!-- Types of Competition -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-bold mb-6">Types of competition</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @for ($i = 1; $i <= 4; $i++)
                <div class="relative cursor-pointer">
                    <img src="{{ URL::asset('images/cardPlaceholder.svg') }}" alt="Competition Type {{ $i }}" class="w-full h-48 object-cover rounded-lg">
                    <p class="mt-2 text-center text-gray-600">Lorem ipsum</p>
                </div>
                @endfor
            </div>
        </div>

        <!-- Event Cards -->
        @for ($i = 1; $i <= 4; $i++)
        <div class="bg-white rounded-lg shadow-sm p-6 mb-4 flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/4">
                <img src="{{ URL::asset('images/cardPlaceholder.svg') }}" alt="Event {{ $i }}" class="w-full h-48 object-cover rounded-lg">
                <p class="mt-2 text-center text-gray-600">Lorem ipsum</p>
            </div>
            <div class="w-full md:w-3/4">
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                <button class="bg-gray-100 px-4 py-2 rounded-full text-sm float-right">More</button>
            </div>
        </div>
        @endfor
    </div>
</x-app-layout>