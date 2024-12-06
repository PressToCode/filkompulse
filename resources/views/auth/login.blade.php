<x-FilkompulseAuth-Layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Splash Image -->
    <x-slot:splash>
        <div class="d-flex col-3 col-md-6 mh-100">
            <img src="{{URL::asset('/images/loginSplash.svg')}}" class="img-fluid w-100 object-fit-cover rounded-start-5" alt="">
        </div>
    </x-slot:splash>

    <!-- Form contents -->
    <div class="d-flex col flex-col rounded-5">
        <x-auth-header></x-auth-header>
        <div class="d-flex flex-column flex-grow-1 justify-content-center">
            <x-auth-title title="Hello Champion!" subtitle="Welcome to Filkom Pulse!!" googleText="Sign In with Google"></x-auth-title>
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{ route('login') }}" class="w-50 py-3">
                    @csrf
            
                    <!-- Email Address -->
                    <div class="d-flex flex-col">
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
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
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
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-FilkompulseAuth-Layout>
