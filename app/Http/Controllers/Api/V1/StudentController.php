<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StudentResource;
use App\Http\Resources\V1\StudentCollection;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StudentCollection(Student::paginate()); // Paginate the student records
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'gender' => 'nullable|string|in:Male,Female,Other',
        ]);
        
        $student = Student::create($request->all());
        return response()->json([
            'message' => 'Student created successfully',
            'student' => $student,
        ], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student); // Transform the single student record into JSON
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $student->id,
            'age' => 'sometimes|required|integer',
            'city' => 'sometimes|required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'gender' => 'nullable|string|in:Male,Female,Other',
        ]);

        $student->update($request->all());

        return response()->json([
            'message' => 'Student updated successfully',
            'student' => $student,
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
