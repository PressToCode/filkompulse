<x-FilkompulseAuth-Layout>
    <!-- Splash Image -->
    <div class="tw-flex-auto tw-h-full tw-max-h-full tw-w-full tw-max-w-full tw-rounded-s-3xl tw-overflow-hidden">
        <img src="{{URL::asset('/images/loginSplash.svg')}}" class="tw-h-full tw-w-full tw-object-cover" alt="">
    </div>
    
    <!-- Form contents -->
    <div class="tw-flex tw-flex-auto tw-flex-col tw-h-full tw-w-full tw-rounded-e-3xl">
    <x-auth-header></x-auth-header>
        <div class="d-flex flex-column flex-grow-1 justify-content-center tw-content-center px-4">
            <x-auth-title title="Hello Champion!" subtitle="Welcome to Filkom Pulse!!" googleText="Sign Up with Google"></x-auth-title>
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{ route('register') }}" class="w-50 py-3">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-2">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password"
                                        placeholder="Password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Register Button -->
                    <x-primary-button class="d-flex text-center justify-content-center w-100 mt-2 mt-md-4">
                        {{ __('Register') }}
                    </x-primary-button>

                    <!-- Sign Up -->
                    <p class="text-light mt-0 mt-md-3 text-center">
                        Already have an account?
                        <a class="tw-underline tw-text-sm tw-text-gray-400 hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Sign In') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-FilkompulseAuth-Layout>
