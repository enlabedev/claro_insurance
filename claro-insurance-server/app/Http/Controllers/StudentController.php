<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Classes\ResponseClass;
use App\Interfaces\StudentRepositoryInterface;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StudentRequest;


class StudentController extends Controller
{
    private $studentRepositoryInterface;

    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->studentRepositoryInterface = $studentRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students = $this->studentRepositoryInterface->index();
            return ResponseClass::sendResponse(StudentResource::collection($students), "Students retrieved successfully");
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
    public function store(StudentRequest $request)
    {
        try {
            $student = $this->studentRepositoryInterface->store($request->all());
            return ResponseClass::sendResponse(new StudentResource($student), "Student created successfully", 201);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        try {
            return ResponseClass::sendResponse(new StudentResource($student), "Student retrieved successfully");
        } catch (\Exception $e) {
            return ResponseClass::throw($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        try {
            $request->merge(['id' => $student->id]);
            $this->studentRepositoryInterface->update($request->all(), $student->id);
            return ResponseClass::sendResponse([], "Student updated successfully", 204);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $this->studentRepositoryInterface->delete($student->id);
            return ResponseClass::sendResponse([], "Student deleted successfully", 204);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    public function delete_course(Student $student, Course $course)
    {
        try {
            $this->studentRepositoryInterface->delete_course($student->id, $course->id);
            return ResponseClass::sendResponse([], "Course deleted successfully", 204);
        } catch (\Exception $e) {
            return ResponseClass::rollback($e);
        }
    }
}
