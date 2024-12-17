<div class="tw-flex tw-flex-col md:tw-flex-row tw-bg-gray-800 tw-rounded-lg tw-overflow-hidden tw-shadow-lg">
    <div class="tw-w-full md:tw-w-1/3">
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="tw-w-full tw-h-full tw-object-cover">
    </div>
    <div class="tw-flex tw-flex-col tw-justify-between tw-p-6 tw-w-full md:tw-w-2/3">
        <div>
            <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-2">{{ $title }}</h3>
            <p class="tw-text-gray-400 tw-mb-4">{{ $description }}</p>
        </div>
        <button class="tw-bg-purple-600 hover:tw-bg-purple-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded-full tw-w-fit">
            {{ $buttonText }}
        </button>
    </div>
</div>