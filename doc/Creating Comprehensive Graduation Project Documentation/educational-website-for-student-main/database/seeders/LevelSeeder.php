<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Beginner',
                'description' => 'For students aged 6 to 8 who are just starting.',
                'min_age' => 6,
                'max_age' => 8,
                'order' => 1,
            ],
            [
                'name' => 'Intermediate',
                'description' => 'For students aged 9 to 11 with some experience.',
                'min_age' => 9,
                'max_age' => 11,
                'order' => 2,
            ],
            [
                'name' => 'Advanced',
                'description' => 'For students aged 12 to 15 ready for more challenges.',
                'min_age' => 12,
                'max_age' => 15,
                'order' => 3,
            ],
            [
                'name' => 'Expert',
                'description' => 'For students 16 and above aiming for mastery.',
                'min_age' => 16,
                'max_age' => 18,
                'order' => 4,
            ],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
