<x-app-layout>
    <x-slot name="header">
        Create New Robotics Kit
    </x-slot>

    <x-card title="Kit Information">
        <form action="{{ route('kits.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                @error('name')
                    <x-alert type="error" class="mt-2">{{ $message }}</x-alert>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                @error('description')
                    <x-alert type="error" class="mt-2">{{ $message }}</x-alert>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <x-action-button variant="secondary" icon="back" :href="route('kits.index')">
                    Cancel
                </x-action-button>
                <x-action-button variant="primary" icon="save" type="submit">
                    Create Kit
                </x-action-button>
            </div>
        </form>
    </x-card>
</x-app-layout>
