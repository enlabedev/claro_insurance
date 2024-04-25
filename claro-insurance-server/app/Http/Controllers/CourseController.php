<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Classes\ResponseClass;
use App\Interfaces\CourseRepositoryInterface;
use App\Http\Resources\CourseResource;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    private $courseRepositoryInterface;

    public function __construct(CourseRepositoryInterface $courseRepositoryInterface)
    {
        $this->courseRepositoryInterface = $courseRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = $this->courseRepositoryInterface->index();
            return ResponseClass::sendResponse(CourseResource::collection($courses), "Courses retrieved successfully");
        } catch (\Exception $e) {
            return ResponseClass::throw($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        try {
            $course = $this->courseRepositoryInterface->store($request->all());
            return ResponseClass::sendResponse(new CourseResource($course), "Course created successfully", 201);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        try {
            return ResponseClass::sendResponse(new CourseResource($course), "Course retrieved successfully");
        } catch (\Exception $e) {
            return ResponseClass::throw($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        try {
            $request->merge(['id' => $course->id]);
            $this->courseRepositoryInterface->update($request->all(), $course->id);
            return ResponseClass::sendResponse([], "Course updated successfully", 204);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $this->courseRepositoryInterface->delete($course->id);
            return ResponseClass::sendResponse([], "Course deleted successfully", 204);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    public function top_courses()
    {
        try {
            $courses = $this->courseRepositoryInterface->top_courses();
            return ResponseClass::sendResponse($courses, "Top courses retrieved successfully");
        } catch (\Exception $e) {
            return ResponseClass::throw($e);
        }
    }
}
