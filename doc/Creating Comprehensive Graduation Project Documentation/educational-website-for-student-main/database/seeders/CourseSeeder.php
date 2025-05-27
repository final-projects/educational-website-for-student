<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Level;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coursesPerLevel = [
            'Beginner' => [
                'Basic English',
                'Intro to Math',
                'Fun Science Experiments',
                'Basic Computer Skills',
                'Drawing & Colors',
            ],
            'Intermediate' => [
                'Grammar & Writing',
                'Algebra Basics',
                'Introduction to Physics',
                'Computer Fundamentals',
                'Geography & Maps',
            ],
            'Advanced' => [
                'Creative Writing',
                'Geometry & Problem Solving',
                'Applied Physics',
                'Basic Programming (Python)',
                'Environmental Science',
            ],
            'Expert' => [
                'Essay & Academic Writing',
                'Advanced Mathematics',
                'Physics for Engineers',
                'Web Development',
                'Critical Thinking & Logic',
            ],
        ];

        $levels = Level::all();

        foreach ($levels as $level) {
            $levelCourses = $coursesPerLevel[$level->name] ?? [];

            foreach ($levelCourses as $title) {
                Course::create([
                    'title' => $title,
                    'description' => "This course covers: {$title}, tailored for the {$level->name} level.",
                    'level_id' => $level->id,
                ]);
            }
        }
    }
}
