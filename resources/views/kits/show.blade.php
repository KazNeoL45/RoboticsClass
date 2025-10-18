<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Robotics Kit Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Name:</h3>
                        <p class="text-gray-900">{{ $kit->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Description:</h3>
                        <p class="text-gray-900">{{ $kit->description ?? 'No description provided' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Courses Using This Kit:</h3>
                        @if($kit->courses->count() > 0)
                            <ul class="list-disc list-inside mt-2">
                                @foreach($kit->courses as $course)
                                    <li class="text-gray-900">
                                        <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $course->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No courses using this kit yet.</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Created At:</h3>
                        <p class="text-gray-900">{{ $kit->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Updated At:</h3>
                        <p class="text-gray-900">{{ $kit->updated_at->format('Y-m-d H:i:s') }}</p>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('kits.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Back to List
                        </a>
                        <a href="{{ route('kits.edit', $kit) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Kit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
