<x-app-layout>
    <x-slot name="header">
        Robotics Kit Details
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-card title="{{ $kit->name }}">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Description</h3>
                        <p class="mt-2 text-gray-900 leading-relaxed">{{ $kit->description ?? 'No description provided' }}</p>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-3">Courses Using This Kit</h3>
                        @if($kit->courses->count() > 0)
                            <div class="space-y-2">
                                @foreach($kit->courses as $course)
                                    <a href="{{ route('courses.show', $course) }}" class="flex items-center gap-2 p-3 rounded-lg bg-gray-50 hover:bg-indigo-50 border border-gray-200 hover:border-indigo-300 transition-all">
                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        <span class="font-medium text-gray-900">{{ $course->name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <x-alert type="info">
                                No courses using this kit yet.
                            </x-alert>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <x-action-button variant="secondary" icon="back" :href="route('kits.index')">
                        Back to List
                    </x-action-button>
                    <x-action-button variant="primary" icon="edit" :href="route('kits.edit', $kit)">
                        Edit Kit
                    </x-action-button>
                </div>
            </x-card>
        </div>

        <div class="lg:col-span-1">
            <x-card title="Kit Information">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Created</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $kit->created_at->format('M d, Y') }}</dd>
                        <dd class="text-xs text-gray-500">{{ $kit->created_at->format('h:i A') }}</dd>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $kit->updated_at->format('M d, Y') }}</dd>
                        <dd class="text-xs text-gray-500">{{ $kit->updated_at->format('h:i A') }}</dd>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <dt class="text-sm font-medium text-gray-500">Total Courses</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                {{ $kit->courses->count() }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </x-card>
        </div>
    </div>
</x-app-layout>
