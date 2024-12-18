<x-app-layout>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6 tw-border-b tw-border-gray-200">
                    @if (session('success'))
                        <div class="tw-mb-4 tw-bg-green-100 tw-border tw-border-green-400 tw-text-green-700 tw-px-4 tw-py-3 tw-rounded relative" role="alert">
                            <strong class="tw-font-bold">Success!</strong>
                            <span class="tw-block tw-sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="tw-mb-4 tw-bg-red-100 tw-border tw-border-red-400 tw-text-red-700 tw-px-4 tw-py-3 tw-rounded relative" role="alert">
                            <strong class="tw-font-bold">Error!</strong>
                            <span class="tw-block tw-sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('event-submissions.store') }}" enctype="multipart/form-data" class="tw-space-y-6">
                        @csrf

                        <div class="tw-grid tw-grid-cols-1 tw-gap-6 tw-mt-4 tw-sm:grid-cols-2">
                            <!-- Judul Event -->
                            <div>
                                <h1 class="tw-font-bold tw-text-3xl tw-leading-tight tw-mb-6">
                                {{ __('Submit New Event') }}
                                </h1>
                                <x-input-label for="title" :value="__('Event Title')" />
                                <x-text-input id="title" class="tw-block tw-mt-1 tw-w-full" type="text" name="title" :value=" old('title') ?? $event->title" required autofocus />
                            </div>

                            <!-- Tanggal Event -->
                            <div>
                                <x-input-label for="date" :value="__('Event Date and Time')" />
                                <x-text-input id="date" class="tw-block tw-mt-1 tw-w-full" type="datetime-local" name="date" :value="old('date') ?? $event->date" required />
                            </div>

                            <!-- Tipe Lokasi Event -->
                            <div>
                                <x-input-label for="location_type" :value="__('Location Type')" />
                                <select id="location_type" name="location_type" class="tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-border-gray-700 tw-bg-gray-900 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600" required>
                                    <option value="Offline" {{ old('location_type') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                    <option value="Online" {{ old('location_type') == 'Online' ? 'selected' : '' }}>Online</option>
                                </select>
                            </div>

                            <!-- Lokasi Event -->
                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input id="location" class="tw-block tw-mt-1 tw-w-full" type="text" name="location" :value="old('location') ?? $event->location" />
                            </div>
                        </div>

                        <!-- Deskripsi Event -->
                        <div class="tw-mt-4">
                            <x-input-label for="description" :value="__('Event Description')" />
                            <textarea id="description" name="description" rows="4" class="tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-border-gray-700 tw-bg-gray-900 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600" required>{{ old('description') ?? $event->description }}</textarea>
                        </div>

                        <!-- Attachment -->
                        <div class="tw-mt-4">
                            <x-input-label for="images" :value="__('Event Images')" />
                            <input id="images" type="file" name="images[]" multiple class="tw-block tw-mt-1 tw-w-full" accept="image/*">
                        </div>

                        <!-- Link Event -->
                        <div class="tw-mt-4">
                            <x-input-label for="links" :value="__('Event Links')" />
                            <div id="links-container">
                                <div class="tw-flex tw-space-x-2 tw-mb-2">
                                    <x-text-input type="url" name="links[]" class="tw-block tw-w-full" placeholder="https://example.com" />
                                    <button type="button" class="tw-bg-blue-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" onclick="addLinkField()">+</button>
                                </div>
                                @foreach ($eventLink as $link)
                                <div class="tw-flex tw-space-x-2 tw-mb-2">
                                    <x-text-input type="url" name="links[]" class="tw-block tw-w-full tw-rounded-md tw-shadow-sm tw-border-gray-300 focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" value="{{$link->URL}}" />
                                    <button type="button" class="tw-bg-red-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" onclick="this.parentElement.remove()">-</button>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Kategori Event -->
                        <div class="tw-mt-4">
                            <x-input-label for="category" :value="__('Event Category')" />
                            <div id="category-container">
                                <div class="tw-flex tw-space-x-2 tw-mb-2">
                                    <select id="category" name="category[]" class="tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-border-gray-700 tw-bg-gray-900 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600" required>
                                        <option value="no" selected disabled>Choose Category</option>
                                        @foreach ($categories as $category)
                                            @php
                                                $name = $category->categoryName;
                                            @endphp
                                            <option value="{{$name}}" {{ old('category') == $name ? 'selected' : '' }}>{{$name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="tw-bg-blue-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" onclick="addCategoryField()">+</button>
                                </div>
                                @foreach ($eventCategories as $eventCategory)
                                <div class="tw-flex tw-space-x-2 tw-mb-2">
                                    <select id="category" name="category[]" class="tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-border-gray-700 tw-bg-gray-900 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600" required>
                                        @php
                                            $value=$categories->firstWhere('categoryID', $eventCategory)->categoryName;
                                            $filtered=$categories->filter(function ($category) use ($eventCategory) { 
                                                return !in_array($category->categoryID, (array)$eventCategory); 
                                            });
                                        @endphp
                                        <option value="{{$value}}" {{ old('category') == $value ? 'selected' : '' }}>{{$value}}</option>
                                        @foreach ($filtered as $category)
                                            @php
                                                $name = $category->categoryName;
                                            @endphp
                                            <option value="{{$name}}" {{ old('category') == $name ? 'selected' : '' }}>{{$name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="tw-bg-red-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" onclick="this.parentElement.remove()">-</button>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                            <x-primary-button class="tw-ml-4">
                                {{ __('Submit Event') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addLinkField() {
            const container = document.getElementById('links-container');
            const newField = document.createElement('div');
            newField.className = 'tw-flex tw-space-x-2 tw-mb-2';
            newField.innerHTML = `
                <x-text-input type="url" name="links[]" class="tw-block tw-w-full tw-rounded-md tw-shadow-sm tw-border-gray-300 focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" placeholder="https://example.com" />
                <button type="button" class="tw-bg-red-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" onclick="this.parentElement.remove()">-</button>
            `;
            container.appendChild(newField);
        }

        function addCategoryField() {
            const container = document.getElementById('category-container');
            const newField = document.createElement('div');
            newField.className = 'tw-flex tw-space-x-2 tw-mb-2';
            newField.innerHTML = `
                <select id="category" name="category[]" class="tw-block tw-mt-1 tw-w-full tw-rounded-md tw-shadow-sm focus:tw-ring focus:tw-ring-opacity-50 tw-border-gray-700 tw-bg-gray-900 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600" required>
                    @foreach ($categories as $category)
                        @php
                            $name = $category->categoryName;
                        @endphp
                        <option value="{{$name}}" {{ old('category') == $name ? 'selected' : '' }}>{{$name}}</option>
                    @endforeach
                </select>
                <button type="button" class="tw-bg-red-500 tw-text-white tw-px-4 tw-py-2 tw-rounded" onclick="this.parentElement.remove()">-</button>
            `;
            container.appendChild(newField);
        }
    </script>
</x-app-layout>
