<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Generate students
        $students = Student::factory(50)->create();
        
        // Generate courses
        $courses = Course::factory(10)->create();
        
        // Generate enrollments
        $students->each(function ($student) use ($courses) {
            Enrollment::factory(3)->create([
                'student_id' => $student->id,
                'course_id' => $courses->random()->id, // Randomly assign a course to each enrollment
            ]);
        });
    }
}
