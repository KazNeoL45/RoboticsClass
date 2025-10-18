<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Introduction to Arduino',
                'description' => 'Learn the basics of Arduino programming',
                'robotics_kit_id' => 1,
            ],
            [
                'name' => 'Advanced Arduino Projects',
                'description' => 'Build complex projects with Arduino',
                'robotics_kit_id' => 1,
            ],
            [
                'name' => 'Raspberry Pi Basics',
                'description' => 'Getting started with Raspberry Pi',
                'robotics_kit_id' => 2,
            ],
            [
                'name' => 'IoT with Raspberry Pi',
                'description' => 'Create IoT projects using Raspberry Pi',
                'robotics_kit_id' => 2,
            ],
            [
                'name' => 'LEGO Robotics 101',
                'description' => 'Build and program LEGO robots',
                'robotics_kit_id' => 3,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
