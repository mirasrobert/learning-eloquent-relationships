<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        // Get the student with both course and subjects
        $studentWithCourseAndSubjects = Student::with(['course','subjects'])
                                        ->get(); // or findOrFail()

        return $studentWithCourseAndSubjects;
        
    }

    public function getSingleStudent(Student $student)
    {
        return $student;
    }

    public function getStudentCourse($id)
    {
        // Get the student with his course
        $studentWithCourse = Student::with('course')->findOrFail($id);

        return $studentWithCourse;
    }


    public function getStudentSubjects($id)
    {
        // Get the student with his subjects
        $studentWithSubjects = Student::with('subjects')->findOrFail($id);

        return $studentWithSubjects;
    }
}
