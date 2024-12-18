<x-app-layout>
    {{-- Hero Section --}}
    <section class="tw-text-white tw-p-8 tw-rounded-lg">
        <div class="tw-max-w-6xl tw-mx-auto">
            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-8 tw-pt-10">
                <div class="">
                    <h1 class="tw-text-4xl tw-font-bold tw-mb-4 tw-col-span-1">{{ $event->title }}</h1>
                    <div class="tw-flex tw-w-full tw-max-w-full tw-rounded-lg tw-overflow-hidden tw-transition tw-ease-out hover:tw-scale-105 tw-duration-200">
                        <img src="{{ $event->image()->first()->imageURL ?? URL::asset('images/cardPlaceholder.svg') }}" alt="{{ $event->title }}" class="tw-w-full tw-max-h-80 tw-object-cover tw-rounded-lg">
                    </div>
                </div>
                <div>
                    <!-- I'm pretty sure there's a better way around this bruh -->
                    <h1 class="tw-text-4xl tw-font-bold tw-mb-4 tw-hidden md:tw-block md:tw-text-transparent">{{ $event->title }}</h1>
                    <p class="tw-mb-6">{{ $event->description }}</p>
                    <div class="tw-flex tw-gap-4 tw-mb-8">
                        <a href="#about" class="tw-bg-white/20 tw-px-6 tw-py-2 tw-rounded-full tw-transition tw-ease-out hover:tw-scale-110 tw-duration-200">{{ __('Details')}}</a>
                        <form action="{{ route('event.addToCollection', $event) }}" method="POST">
                            @csrf
                            @if ($errors->any()) 
                                <div class="tw-bg-red-500 tw-px-6 tw-py-2 tw-rounded-full tw-transition tw-ease-out hover:tw-scale-110 tw-duration-200">
                                    {{ $errors->first() }}
                                </div>
                            @else
                                <button type="submit" class="tw-bg-[#6C5DD3] tw-px-6 tw-py-2 tw-rounded-full tw-transition tw-ease-out hover:tw-scale-110 tw-duration-200">Add to Collection</button>
                            @endif
                        </form>
                    </div>
                    <div class="tw-bg-white/20 tw-p-4 tw-rounded-lg tw-flex tw-justify-between tw-items-center">
                        <div class="tw-max-w-[40%]">
                            <p class="tw-text-sm tw-mb-1">LOCATION</p>
                            <p>{{ $event->location }}</p>
                        </div>
                        <div>
                            <p class="tw-text-sm tw-mb-1">DATE</p>
                            <p>{{ $event->date->format('d F Y') }}</p>
                        </div>
                        <form action="{{ route('event.addToCollection', $event) }}" method="POST">
                            @csrf
                            @if ($errors->any()) 
                                <div class="tw-bg-red-500 tw-px-6 tw-py-2 tw-rounded-full tw-transition tw-ease-out hover:tw-scale-110 tw-duration-200">
                                    {{ $errors->first() }}
                                </div>
                            @else
                                <button type="submit" class="tw-bg-[#6C5DD3] tw-px-6 tw-py-2 tw-rounded-full tw-transition tw-ease-out hover:tw-scale-110 tw-duration-200">Add to Collection</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="tw-bg-[#0C0E17] tw-py-16">
        <div class="tw-max-w-6xl tw-mx-auto tw-px-8 md:tw-px-0">
            <h2 class="tw-text-3xl tw-font-bold tw-mb-6">ABOUT</h2>
            <p class="tw-max-w-2xl">{{ $event->description }}</p>
        </div>
    </section>

    <!-- Links -->
    @if (!$event->link->isEmpty())
    <section id="links" class="tw-bg-[#0C0E17] tw-py-16">
        <div class="tw-max-w-6xl tw-mx-auto tw-px-8 md:tw-px-0">
            <h2 class="tw-text-3xl tw-font-bold tw-mb-6">MORE INFORMATION</h2>
            @php
                $i = 1;
            @endphp
            @foreach ($event->link as $link)
                <div class="tw-py-3 tw-px-3 tw-rounded-lg tw-bg-white/10">
                    <span class="tw-font-extrabold">Link {{$i++}}:  </span>
                    <a href="{{$link->URL}}" class="tw-max-w-2xl">{{ $link->URL }}</a>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Event Types Section --}}
    <section class="tw-text-white tw-py-16 tw-rounded-lg">
        <div class="tw-max-w-6xl tw-mx-auto">
            <h2 class="tw-text-3xl tw-font-bold tw-mb-8">Event Category</h2>
            <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-4 tw-gap-6">
                @foreach($categories as $category)
                    <a class="tw-block tw-transition tw-ease-out hover:tw-scale-105 tw-duration-200">
                        <div class="tw-bg-white tw-aspect-square tw-rounded-lg tw-mb-4">
                            <img src="{{ URL::asset('images/cardPlaceholder.svg') }}" alt="{{ $category->categoryName }}" class="tw-w-full tw-h-full tw-object-cover tw-rounded-lg">
                        </div>
                        <h3 class="tw-text-center tw-font-bold">{{$category->categoryName}}</h3>
                        <p class="tw-text-center tw-text-neutral-100/70">{{ $category->categoryDescription }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>

