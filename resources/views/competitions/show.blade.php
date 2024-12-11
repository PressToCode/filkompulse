<x-app-layout>
    {{-- Hero Section --}}
    <section class="tw-bg-[#4338CA] tw-text-white tw-p-8 tw-rounded-lg">
        <div class="tw-max-w-6xl tw-mx-auto">
            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-8">
                <div>
                    <h1 class="tw-text-4xl tw-font-bold tw-mb-4">{{ $competition->name }}</h1>
                    <div class="tw-bg-white tw-w-full tw-h-48 tw-rounded-lg">
                        <img src="{{ $competition->image_url }}" alt="{{ $competition->name }}" class="tw-w-full tw-h-full tw-object-cover tw-rounded-lg">
                    </div>
                </div>
                <div>
                    <p class="tw-mb-6">{{ $competition->description }}</p>
                    <div class="tw-flex tw-gap-4 tw-mb-8">
                        <a href="#about" class="tw-bg-white/20 tw-px-6 tw-py-2 tw-rounded-full">Selengkapnya</a>
                        <form action="{{ route('competitions.addToCollection', $competition) }}" method="POST">
                            @csrf
                            <button type="submit" class="tw-bg-blue-500 tw-px-6 tw-py-2 tw-rounded-full">Add to Collection</button>
                        </form>
                    </div>
                    <div class="tw-bg-white/20 tw-p-4 tw-rounded-lg tw-flex tw-justify-between tw-items-center">
                        <div>
                            <p class="tw-text-sm tw-mb-1">LOCATION</p>
                            <p>{{ $competition->location }}</p>
                        </div>
                        <div>
                            <p class="tw-text-sm tw-mb-1">DATE</p>
                            <p>{{ $competition->date->format('d F Y') }}</p>
                        </div>
                        <form action="{{ route('competitions.addToCollection', $competition) }}" method="POST">
                            @csrf
                            <button type="submit" class="tw-bg-blue-500 tw-px-6 tw-py-2 tw-rounded-full">Add to Collection</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="tw-py-16">
        <div class="tw-max-w-6xl tw-mx-auto">
            <h2 class="tw-text-3xl tw-font-bold tw-mb-6">ABOUT</h2>
            <p class="tw-max-w-2xl">{{ $competition->full_description }}</p>
        </div>
    </section>

    {{-- Competition Types Section --}}
    <section class="tw-bg-[#4338CA] tw-text-white tw-py-16 tw-rounded-lg">
        <div class="tw-max-w-6xl tw-mx-auto">
            <h2 class="tw-text-3xl tw-font-bold tw-mb-8">Types of competition</h2>
            <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-4 tw-gap-6">
                @foreach($competition->types as $type)
                    <a href="{{ route('competitions.type', ['type' => $type->slug]) }}" class="tw-block">
                        <div class="tw-bg-white tw-aspect-square tw-rounded-lg tw-mb-4">
                            <img src="{{ $type->image_url }}" alt="{{ $type->name }}" class="tw-w-full tw-h-full tw-object-cover tw-rounded-lg">
                        </div>
                        <p class="tw-text-center">{{ $type->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Competition Details Section --}}
    @foreach($competition->details as $detail)
        <section class="tw-bg-[#4338CA] tw-text-white tw-p-8 tw-rounded-lg tw-mb-6">
            <div class="tw-max-w-6xl tw-mx-auto tw-flex tw-gap-8">
                <div class="tw-w-48 tw-h-48 tw-bg-white tw-rounded-lg tw-shrink-0">
                    <img src="{{ $detail->image_url }}" alt="{{ $detail->title }}" class="tw-w-full tw-h-full tw-object-cover tw-rounded-lg">
                </div>
                <div class="tw-flex-1">
                    <h3 class="tw-text-xl tw-font-bold tw-mb-4">{{ $detail->title }}</h3>
                    <p class="tw-mb-4">{{ $detail->description }}</p>
                    <div class="tw-flex tw-justify-end">
                        <form action="{{ route('competitions.addToCollection', $competition) }}" method="POST">
                            @csrf
                            <input type="hidden" name="detail_id" value="{{ $detail->id }}">
                            <button type="submit" class="tw-bg-blue-500 tw-px-6 tw-py-2 tw-rounded-full">Add to Collection</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
</x-app-layout>

