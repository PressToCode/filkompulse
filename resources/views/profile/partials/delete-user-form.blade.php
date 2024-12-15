<section class="tw-space-y-6">
    <header>
        <h2 class="tw-text-lg tw-font-medium tw-text-white">
            {{ __('Delete Account') }}
        </h2>

        <p class="tw-mt-1 tw-text-sm tw-text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="tw-ml-3 tw-bg-red-600 hover:tw-bg-red-700 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-red-500">
    {{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="tw-p-0 tw-bg-gray-900 tw-text-white tw-border tw-border-gray-700">
            <form method="post" action="{{ route('profile.destroy') }}" class="tw-p-6">
                @csrf
                @method('delete')

                <h2 class="tw-text-lg tw-font-medium tw-text-white">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="tw-mt-1 tw-text-sm tw-text-gray-300">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="tw-mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="tw-sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="tw-mt-1 tw-block tw-w-3/4 tw-bg-gray-800 tw-border tw-border-gray-700 tw-text-white focus:tw-ring-2 focus:tw-ring-red-500 focus:tw-border-red-500 focus:tw-bg-gray-800"
                        placeholder="{{ __('Password') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="tw-mt-2 tw-text-red-500" />
                </div>

                <div class="tw-mt-6 tw-flex tw-justify-end">
                    <!-- Cancel Button -->
                    <x-secondary-button x-on:click="$dispatch('close')" class="tw-bg-gray-800 tw-text-white hover:tw-bg-gray-700">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <!-- Delete Account Button -->
                    <x-danger-button 
                        class="tw-ml-3 tw-bg-red-600 hover:tw-bg-red-700 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-red-500">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</section>

