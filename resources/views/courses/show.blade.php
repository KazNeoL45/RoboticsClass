<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($course->image)
                        <div class="mb-6">
                            <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full max-w-md rounded-lg shadow-md">
                        </div>
                    @endif

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Name:</h3>
                        <p class="text-gray-900">{{ $course->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Description:</h3>
                        <p class="text-gray-900">{{ $course->description ?? 'No description provided' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Robotics Kit:</h3>
                        <p class="text-gray-900">{{ $course->roboticsKit->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Created At:</h3>
                        <p class="text-gray-900">{{ $course->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Updated At:</h3>
                        <p class="text-gray-900">{{ $course->updated_at->format('Y-m-d H:i:s') }}</p>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('courses.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Back to List
                        </a>
                        <a href="{{ route('courses.edit', $course) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Course
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
