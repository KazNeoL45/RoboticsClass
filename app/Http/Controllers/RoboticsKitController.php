<?php

namespace App\Http\Controllers;

use App\Models\RoboticsKit;
use Illuminate\Http\Request;

class RoboticsKitController extends Controller
{
    public function index()
    {
        $kits = RoboticsKit::withCount('courses')->get();
        return view('kits.index', compact('kits'));
    }

    public function create()
    {
        return view('kits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        RoboticsKit::create($validated);

        return redirect()->route('kits.index')->with('success', 'Robotics Kit created successfully.');
    }

    public function show(RoboticsKit $kit)
    {
        $kit->load('courses');
        return view('kits.show', compact('kit'));
    }

    public function edit(RoboticsKit $kit)
    {
        return view('kits.edit', compact('kit'));
    }

    public function update(Request $request, RoboticsKit $kit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $kit->update($validated);

        return redirect()->route('kits.index')->with('success', 'Robotics Kit updated successfully.');
    }

    public function destroy(RoboticsKit $kit)
    {
        $kit->delete();

        return redirect()->route('kits.index')->with('success', 'Robotics Kit deleted successfully.');
    }
}
