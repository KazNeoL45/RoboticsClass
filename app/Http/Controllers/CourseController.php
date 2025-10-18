<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('roboticsKit')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $roboticsKits = RoboticsKit::all();
        return view('courses.create', compact('roboticsKits'));
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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/courses'), $imageName);
            $validated['image'] = 'images/courses/' . $imageName;
        }

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        $course->load('roboticsKit');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $roboticsKits = RoboticsKit::all();
        return view('courses.edit', compact('course', 'roboticsKits'));
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
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/courses'), $imageName);
            $validated['image'] = 'images/courses/' . $imageName;
        }

        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
