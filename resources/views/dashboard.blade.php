<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-semibold uppercase">Total Courses</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalCourses }}</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-semibold uppercase">Robotics Kits</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalKits }}</div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-semibold uppercase">Total Users</div>
                        <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Available Courses</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($courses as $course)
                            <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                                @if($course->image)
                                    <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">No image</span>
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg mb-2">{{ $course->name }}</h4>
                                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($course->description, 100) }}</p>
                                    <p class="text-xs text-gray-500 mb-3">
                                        <span class="font-semibold">Kit:</span> {{ $course->roboticsKit->name }}
                                    </p>
                                    <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
