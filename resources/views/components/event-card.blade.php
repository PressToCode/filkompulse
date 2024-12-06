<div class="event-card bg-dark text-white rounded p-4 h-100">
    <div class="d-flex align-items-center gap-3 mb-3">
        <div class="avatar bg-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <span class="fw-bold">{{ $avatarLetter }}</span>
        </div>
        <div>
            <h5 class="mb-0 fw-bold">{{ $organizer }}</h5>
            <small class="text-secondary">{{ $organizerRole }}</small>
        </div>
    </div>
    <img src="{{ $imageUrl }}" class="img-fluid mb-3 rounded" alt="Event image">
    <h4 class="event-title fw-bold mb-2">{{ $title }}</h4>
    <p class="event-time text-secondary small mb-3">{{ $dateTime }} | {{ $location }}</p>
    <p class="event-description text-light small mb-4">{{ $description }}</p>
    <button class="btn btn-purple px-4 rounded-pill">Enabled</button>
</div>