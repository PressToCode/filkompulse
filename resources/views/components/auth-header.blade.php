<div class="d-flex px-4 py-4">
    <!-- Upper Part -->
    <div class="col-3">
        <a href="{{ route('dashboard') }}">
            <img src="{{URL::asset('/images/filkompulse.png')}}" class="img-fluid object-fit-cover" alt="">
        </a>
    </div>
    <div class="col-6"></div>
    <a href="{{ url()->previous() == url()->current() ? route('dashboard') : url()->previous() }}" class="col text-end text-light"> Go Back </a>
</div>