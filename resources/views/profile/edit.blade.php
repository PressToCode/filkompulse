<style>
    body {
        padding-top: 80px; 
    }
</style>

<x-app-layout>
    <!-- Page Header -->
    <header class="tw-shadow tw-bg-gray-800">
        <!-- Padding-top memastikan header berada di bawah navbar -->
        <div class="tw-max-w-7xl tw-mx-auto tw-py-6 tw-px-4 sm:tw-px-6 lg:tw-px-8">
            <h1 class="tw-text-3xl tw-font-bold">Profile</h1>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="tw-flex tw-items-center tw-justify-center">
        <!-- Center content both horizontally and vertically -->
        <div class="tw-max-w-7xl tw-w-full tw-rounded-lg tw-shadow-md tw-p-6">
            <div x-data="{ activeTab: 0 }" class="tw-space-y-6">
                <!-- Tab Buttons -->
                <div class="tw-flex tw-p-1 tw-space-x-1 tw-bg-gray-800 tw-rounded-xl">
                    <button
                        class="tw-w-full tw-py-3 tw-text-sm tw-font-medium tw-rounded-lg focus:tw-outline-none"
                        :class="activeTab === 0 ? 'tw-bg-gray-500 tw-text-gray-800 tw-shadow' : 'tw-text-gray-400 hover:tw-bg-gray-200 hover:tw-text-gray-700'"
                        @click="activeTab = 0"
                    >
                        <i class="bi bi-person tw-mr-2"></i> Profile Information
                    </button>
                    <button
                        class="tw-w-full tw-py-3 tw-text-sm tw-font-medium tw-rounded-lg focus:tw-outline-none"
                        :class="activeTab === 1 ? 'tw-bg-gray-500 tw-text-gray-800 tw-shadow' : 'tw-text-gray-400 hover:tw-bg-gray-200 hover:tw-text-gray-700'"
                        @click="activeTab = 1"
                    >
                        <i class="bi bi-key tw-mr-2"></i> Update Password
                    </button>
                    <button
                        class="tw-w-full tw-py-3 tw-text-sm tw-font-medium tw-rounded-lg focus:tw-outline-none"
                        :class="activeTab === 2 ? 'tw-bg-gray-500 tw-text-gray-800 tw-shadow' : 'tw-text-gray-400 hover:tw-bg-gray-200 hover:tw-text-gray-700'"
                        @click="activeTab = 2"
                    >
                        <i class="bi bi-x-circle tw-mr-2"></i> Delete Account
                    </button>
                </div>

                <!-- Tab Panels -->
                <div class="tw-mt-2">
                    <!-- Profile Information -->
                    <div 
                        x-show="activeTab === 0" 
                        class="tw-bg-gray-800 tw-text-white tw-rounded-lg tw-p-6 tw-border tw-border-gray-700"
                    >
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!-- Update Password -->
                    <div 
                        x-show="activeTab === 1" 
                        class="tw-bg-gray-800 tw-text-white tw-rounded-lg tw-p-6 tw-border tw-border-gray-700"
                    >
                        @include('profile.partials.update-password-form')
                    </div>

                    <!-- Delete Account -->
                    <div 
                        x-show="activeTab === 2" 
                        class="tw-bg-gray-800 tw-text-white tw-rounded-lg tw-p-6 tw-border tw-border-gray-700"
                    >
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

