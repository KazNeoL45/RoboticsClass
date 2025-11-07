<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\RoboticsKitController;
use Illuminate\Support\Facades\Route;

Route::apiResource('robotics-kits', RoboticsKitController::class);

Route::apiResource('courses', CourseController::class);
