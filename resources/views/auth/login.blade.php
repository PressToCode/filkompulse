<x-FilkompulseAuth-Layout>
    <!-- Splash Image -->
    <div class="tw-flex-auto tw-h-full tw-max-h-full tw-w-full tw-max-w-full tw-rounded-s-3xl tw-overflow-hidden">
        <img src="{{URL::asset('/images/loginSplash.svg')}}" class="tw-h-full tw-w-full tw-object-cover" alt="">
    </div>

    <!-- Form contents -->
    <div class="tw-flex tw-flex-auto tw-flex-col tw-h-full tw-w-full tw-rounded-e-3xl tw-overflow-auto">
        <x-auth-header></x-auth-header>
        <div class="tw-flex-1 tw-justify-center tw-content-center">
            <x-auth-title title="Hello Champion!" subtitle="Welcome to Filkom Pulse!!" googleText="Sign In with Google"></x-auth-title>
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{ route('login') }}" class="w-50 py-3">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" class="d-block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-2">            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password"
                                        placeholder="Password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <a class="tw-underline tw-text-sm tw-text-gray-400 hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <!-- Sign In Button -->
                    <x-primary-button class="d-flex text-center justify-content-center w-100 mt-2 mt-md-4">
                        {{ __('Sign In') }}
                    </x-primary-button>

                    <!-- Register -->
                    <p class="text-light mt-0 mt-md-3 text-center">
                        Need an account?
                        <a class="tw-underline tw-text-sm tw-text-gray-400 hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-offset-gray-800" href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    </p>
                </form>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 tw-text-center" :status="session('status')" />
            </div>
        </div>
    </div>
</x-FilkompulseAuth-Layout>
