@props(['name', 'description'])

<x-app-layout>
    @section('title', 'Show Manager - '.$name)
    <!-- <header class="header mb-5">
        <div class="container">
            <h1>Show Manager</h1>
        </div>
    </header> -->

    <!-- Why is there even 2 header with the same title????? -->

    <main class="container pt-5 tw-h-dvh">
        <h1 class="text-center mb-5 mt-5">
            <span class="red-underline">SHOW MANAGER</span>
        </h1>

        <!-- TODO: BAD COMPONENT -->
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="{{ URL::asset('images/cardPlaceholder.svg') }}" alt="Run Your Local Show" class="img-fluid mb-3">
                <h2>RUN YOUR LOCAL SHOW</h2>
            </div>
            <div class="col-md-6">
                <img src="{{ URL::asset('images/cardPlaceholder.svg') }}" alt="Manage Your Competitions" class="img-fluid mb-3">
                <h2>MANAGE YOUR COMPETITIONS</h2>
            </div>
        </div>

        <div class="competition-details mb-5">
            <h2>{{ $name }}</h2>
            <p>{{ $description }}</p>
            <!-- Add more competition details here -->
        </div>

        <div class="text-center">
            <h3>THIS SITE IS UNDER DEVELOPMENT</h3>
            <p>SUPPORTING THE EVOLUTION OF THE SHOW MANAGER PRODUCT</p>
        </div>
    </main>
</x-app-layout>