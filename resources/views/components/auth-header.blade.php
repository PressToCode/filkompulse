<div class="tw-flex tw-flex-initial tw-flex-row tw-flex-nowrap px-4 py-4">
    <!-- Upper Part -->
    <div class="tw-flex tw-w-[10vw]">
        <a href="{{ route('dashboard') }}">
            <img src="{{URL::asset('/images/filkompulse.png')}}" class="img-fluid object-fit-cover" alt="">
        </a>
    </div>
    <a href="{{ url()->previous() == url()->current() ? route('dashboard') : url()->previous() }}" class="tw-flex-1 text-end text-light"> Go Back </a>
</div>