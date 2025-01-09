<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CourseResource;
use App\Http\Resources\V1\CourseCollection;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CourseCollection(Course::paginate()); // Paginate the course records
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
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
        ]);
    
        $course = Course::create($request->all());
    
        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return new CourseResource($course); // Transform the single course record into JSON
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //S
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'sometimes|required|integer',
            'level' => 'sometimes|required|string|in:Beginner,Intermediate,Advanced',
        ]);
    
        $course->update($validatedData);
    
        return response()->json([
            'message' => 'Course updated successfully',
            'course' => $course->fresh(),
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
    
        return response()->json(['message' => 'Course deleted successfully']);
    }
}
