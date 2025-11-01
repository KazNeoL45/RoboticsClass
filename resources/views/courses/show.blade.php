<x-app-layout>
    <x-slot name="header">
        Course Details
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-card title="{{ $course->name }}">
                @if($course->image)
                    <div class="mb-6">
                        <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full max-w-2xl rounded-lg shadow-lg">
                    </div>
                @endif

                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Description</h3>
                        <p class="mt-2 text-gray-900 leading-relaxed">{{ $course->description ?? 'No description provided' }}</p>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Robotics Kit</h3>
                        <p class="mt-2">
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-indigo-100 text-indigo-800 font-semibold">
                                {{ $course->roboticsKit->name }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <x-action-button variant="secondary" icon="back" :href="route('courses.index')">
                        Back to List
                    </x-action-button>
                    <x-action-button variant="primary" icon="edit" :href="route('courses.edit', $course)">
                        Edit Course
                    </x-action-button>
                </div>
            </x-card>
        </div>

        <div class="lg:col-span-1">
            <x-card title="Course Information">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Created</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $course->created_at->format('M d, Y') }}</dd>
                        <dd class="text-xs text-gray-500">{{ $course->created_at->format('h:i A') }}</dd>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $course->updated_at->format('M d, Y') }}</dd>
                        <dd class="text-xs text-gray-500">{{ $course->updated_at->format('h:i A') }}</dd>
                    </div>
                </dl>
            </x-card>
        </div>
    </div>
</x-app-layout>
