<div class="tw-bg-[#322F35]/50 text-white rounded p-4 tw-h-full tw-flex tw-flex-col tw-justify-between tw-transition-all tw-duration-300 hover:tw-scale-105">
    <div class="d-flex align-items-center gap-3 mb-3">
        <div class="tw-bg-[#6c5dd3] rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <span class="fw-bold">{{ $avatarLetter }}</span>
        </div>
        <div>
            <h5 class="mb-0 fw-bold">{{ $organizer }}</h5>
            <small class="text-secondary">{{ $organizerRole }}</small>
        </div>
    </div>
    <img src="{{ $imageUrl ?? URL::asset('images/cardPlaceholder.svg') }}" class="img-fluid tw-w-full mb-3 rounded tw-max-h-40 tw-object-cover tw-overflow-hidden" alt="Event image">
    <h4 class="fw-bold mb-2">{{ $title }}</h4>
    <p class="tw-text-slate-300/80 small mb-3">{{ $dateTime }} | {{ $location }}</p>
    <p class="text-light small mb-4 tw-text-justify">{{ $description }} </p>
    <a href="{{ route('event.show', $eventId) }}" class="tw-self-center">
        <button class="btn tw-bg-[#6c5dd3] hover:tw-bg-[#6c5dd3]/80 px-4 rounded-pill">Click Here!</button>
    </a>
</div>