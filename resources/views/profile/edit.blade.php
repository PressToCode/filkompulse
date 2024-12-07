<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-slate-900 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="#" class="text-slate-100 font-semibold text-lg">My App</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-slate-400 hover:text-slate-100">Home</a>
                    <a href="#" class="text-slate-400 hover:text-slate-100">Settings</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="shadow bg-gray-800">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold">Profile</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div x-data="{ activeTab: 0 }" class="space-y-6">
                <!-- Tab Buttons -->
                <div class="flex p-1 space-x-1 bg-gray-800 rounded-xl">
                    <button
                        class="w-full py-3 text-sm font-medium rounded-lg focus:outline-none"
                        :class="activeTab === 0 ? 'bg-gray-500 text-gray-800 shadow' : 'text-gray-400 hover:bg-gray-200 hover:text-gray-700'"
                        @click="activeTab = 0"
                    >
                        <i class="bi bi-person mr-2"></i> Profile Information
                    </button>
                    <button
                        class="w-full py-3 text-sm font-medium rounded-lg focus:outline-none"
                        :class="activeTab === 1 ? 'bg-gray-500 text-gray-800 shadow' : 'text-gray-400 hover:bg-gray-200 hover:text-gray-700'"
                        @click="activeTab = 1"
                    >
                        <i class="bi bi-key mr-2"></i> Update Password
                    </button>
                    <button
                        class="w-full py-3 text-sm font-medium rounded-lg focus:outline-none"
                        :class="activeTab === 2 ? 'bg-gray-500 text-gray-800 shadow' : 'text-gray-400 hover:bg-gray-200 hover:text-gray-700'"
                        @click="activeTab = 2"
                    >
                        <i class="bi bi-x-circle mr-2"></i> Delete Account
                    </button>
                </div>

                <!-- Tab Panels -->
                <div class="mt-2">
                    <!-- Profile Information -->
                    <div 
                        x-show="activeTab === 0" 
                        class="bg-gray-800 text-white rounded-lg p-6 border border-gray-700"
                    >
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!-- Update Password -->
                    <div 
                        x-show="activeTab === 1" 
                        class="bg-gray-800 text-white rounded-lg p-6 border border-gray-700"
                    >
                        @include('profile.partials.update-password-form')
                    </div>

                    <!-- Delete Account -->
                    <div 
                        x-show="activeTab === 2" 
                        class="bg-gray-800 text-white rounded-lg p-6 border border-gray-700"
                    >
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


