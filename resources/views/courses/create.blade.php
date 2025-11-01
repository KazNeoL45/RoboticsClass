<x-app-layout>
    <x-slot name="header">
        Create New Course
    </x-slot>

    <x-card title="Course Information">
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
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

            <div class="mb-6">
                <label for="robotics_kit_id" class="block text-sm font-medium text-gray-700 mb-2">Robotics Kit</label>
                <select name="robotics_kit_id" id="robotics_kit_id" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Select a robotics kit</option>
                    @foreach($roboticsKits as $kit)
                        <option value="{{ $kit->id }}" {{ old('robotics_kit_id') == $kit->id ? 'selected' : '' }}>
                            {{ $kit->name }}
                        </option>
                    @endforeach
                </select>
                @error('robotics_kit_id')
                    <x-alert type="error" class="mt-2">{{ $message }}</x-alert>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Course Image</label>
                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('image')
                    <x-alert type="error" class="mt-2">{{ $message }}</x-alert>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <x-action-button variant="secondary" icon="back" :href="route('courses.index')">
                    Cancel
                </x-action-button>
                <x-action-button variant="primary" icon="save" type="submit">
                    Create Course
                </x-action-button>
            </div>
        </form>
    </x-card>
</x-app-layout>
