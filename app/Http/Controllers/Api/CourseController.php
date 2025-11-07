<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('roboticsKit')->get();
        return CourseResource::collection($courses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'robotics_kit_id' => 'required|exists:robotics_kits,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/courses'), $imageName);
            $validated['image'] = $imageName;
        }

        $course = Course::create($validated);
        $course->load('roboticsKit');

        return new CourseResource($course);
    }

    public function show(Course $course)
    {
        $course->load('roboticsKit');
        return new CourseResource($course);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'robotics_kit_id' => 'required|exists:robotics_kits,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($course->image) {
                $oldImagePath = public_path('images/courses/' . $course->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/courses'), $imageName);
            $validated['image'] = $imageName;
        }

        $course->update($validated);
        $course->load('roboticsKit');

        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        if ($course->image) {
            $imagePath = public_path('images/courses/' . $course->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $course->delete();

        return response()->json([
            'message' => 'Course deleted successfully'
        ], Response::HTTP_OK);
    }
}
