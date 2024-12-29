<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed an Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // Assuming you have a 'role' column in your users table
        ]);

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
