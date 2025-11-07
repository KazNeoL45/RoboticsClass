<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoboticsKitResource;
use App\Models\RoboticsKit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoboticsKitController extends Controller
{
    public function index()
    {
        $kits = RoboticsKit::withCount('courses')->get();
        return RoboticsKitResource::collection($kits);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $kit = RoboticsKit::create($validated);

        return new RoboticsKitResource($kit);
    }

    public function show(RoboticsKit $roboticsKit)
    {
        $roboticsKit->load('courses');
        return new RoboticsKitResource($roboticsKit);
    }

    public function update(Request $request, RoboticsKit $roboticsKit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $roboticsKit->update($validated);

        return new RoboticsKitResource($roboticsKit);
    }

    public function destroy(RoboticsKit $roboticsKit)
    {
        $roboticsKit->delete();

        return response()->json([
            'message' => 'Robotics kit deleted successfully'
        ], Response::HTTP_OK);
    }
}
