<x-FilkompulseAuth-Layout>
    <!-- Splash Image -->
    <x-slot:splash>
        <div class="d-flex col-3 col-md-6 mh-100">
            <img src="{{URL::asset('/images/loginSplash.svg')}}" class="img-fluid w-100 object-fit-cover rounded-start-5" alt="">
        </div>
    </x-slot:splash>

    <div class="d-flex col flex-col rounded-5">
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
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Sign In') }}
                        </a>
                    </p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />  
                </form>
            </div>
        </div>
    </div>
</x-FilkompulseAuth-Layout>
