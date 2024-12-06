<div class="card bg-gray-800 bg-opacity-50 border-0 mb-4">
    <div class="card-body p-4">
        <div class="grid grid-cols-12 gap-4 items-center">
            <div class="col-span-6 md:col-span-7 flex items-center space-x-4">
                <form action="{{ route('events.toggleSelect', $event) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" class="form-check-input border-gray-500" 
                        onChange="this.form.submit()" 
                        {{ $event->is_selected ? 'checked' : '' }}>
                </form>
                <img src="{{ asset($event->image ?? URL::asset('images/cardPlaceholder.svg')) }}" alt="" class="w-20 h-20 rounded object-cover">
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-semibold text-blue-400 mb-2">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-400 line-clamp-2">{{ $event->description }}</p>
                </div>
            </div>

            <div class="col-span-2 md:col-span-2 flex justify-center">
                <form action="{{ route('events.destroy', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-red-500 hover:text-red-400">Delete</button>
                </form>
            </div>

            <div class="col-span-2 md:col-span-2 text-center">
                <span class="text-sm text-gray-400 whitespace-nowrap">{{ $event->date->format('d F Y') }}</span>
            </div>

            <div class="col-span-2 md:col-span-1 flex justify-center">
                <form action="{{ route('events.toggleReminder', $event) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" class="form-check-input border-gray-500" 
                           onChange="this.form.submit()" 
                           {{ $event->has_reminder ? 'checked' : '' }}>
                </form>
            </div>
        </div>
    </div>
</div>
