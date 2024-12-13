<x-FilkompulseAuth-Layout>
    <!-- Splash Image -->
    <div class="tw-flex-auto tw-h-full tw-max-h-full tw-w-full tw-max-w-full tw-rounded-s-3xl tw-overflow-hidden">
        <img src="{{URL::asset('/images/loginSplash.svg')}}" class="tw-h-full tw-w-full tw-object-cover" alt="">
    </div>

    <div class="tw-flex tw-flex-auto tw-flex-col tw-h-full tw-w-full tw-rounded-e-3xl tw-overflow-auto">
        <x-auth-header></x-auth-header>
        <div class="d-flex flex-column flex-grow-1 justify-content-center">
            <x-auth-title title="Forgot Password ?!" subtitle="Don't worry, we'll reset your password!"></x-auth-title>
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{ route('password.email') }}" class="w-50 py-3">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your Email"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="d-flex justify-content-center w-100 mt-4">
                        <x-primary-button class="w-100 text-center justify-content-center">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>

                    <!-- Register -->
                    <p class="text-light mt-0 mt-md-3 text-center">
                        Back to
                        <a class="tw-underline tw-text-sm tw-text-gray-400 hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Sign In') }}
                        </a>
                    </p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 tw-text-center" :status="session('status')" />  
                </form>
            </div>
        </div>
    </div>
</x-FilkompulseAuth-Layout>
