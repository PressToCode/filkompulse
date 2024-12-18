<x-app-layout>
    @section('title', 'Filkom Pulse - Get Verified!')

    <div class="tw-min-h-screen tw-flex tw-flex-col tw-items-center tw-justify-center tw-px-4">
        <div class="tw-max-w-2xl tw-text-center">
            <img src="{{ asset('images/filkompulse.png') }}" alt="Verification" class="tw-w-64 tw-mx-auto tw-mb-8 tw-animate-bounce">
            <h1 class="tw-text-4xl tw-font-bold tw-mb-4 tw-text-blue-600 tw-drop-shadow-[0_0_10px_rgba(59,130,246,0.5)] tw-transition-all tw-duration-300 hover:tw-scale-105">Get Verified Today!</h1>
            <p class="tw-text-lg tw-text-white tw-mb-8 tw-transition-all tw-duration-300 hover:tw-scale-105">Stand out from the crowd and unlock exclusive features by getting your account verified. Click below to submit your verification request.</p>
            <form action="{{ route('admin.sendVerifyRequest') }}" method="POST">
                @csrf
                <button type="submit" class="tw-bg-blue-500 hover:tw-bg-blue-600 tw-text-white tw-font-semibold tw-py-3 tw-px-8 tw-rounded-lg tw-transition-all tw-duration-300 hover:tw-scale-105 hover:tw-shadow-lg">
                    Request Verification
                </button>
            </form>
            @if (session('success'))
                <div class="tw-mt-4 tw-bg-green-100 tw-border tw-border-green-400 tw-text-green-700 tw-px-4 tw-py-3 tw-rounded tw-relative" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="tw-mt-4 tw-bg-red-100 tw-border tw-border-red-400 tw-text-red-700 tw-px-4 tw-py-3 tw-rounded tw-relative" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

</x-app-layout>