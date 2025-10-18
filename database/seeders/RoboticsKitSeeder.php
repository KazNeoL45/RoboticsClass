<?php

namespace Database\Seeders;

use App\Models\RoboticsKit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoboticsKitSeeder extends Seeder
{
    public function run(): void
    {
        $kits = [
            [
                'name' => 'Arduino Starter Kit',
                'description' => 'Basic Arduino kit for beginners',
            ],
            [
                'name' => 'Raspberry Pi Kit',
                'description' => 'Complete Raspberry Pi kit with sensors',
            ],
            [
                'name' => 'LEGO Mindstorms',
                'description' => 'Advanced robotics kit with LEGO components',
            ],
        ];

        foreach ($kits as $kit) {
            RoboticsKit::create($kit);
        }
    }
}
