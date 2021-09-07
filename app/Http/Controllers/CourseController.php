<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function index()
    {
        // Get the course with all of his subjects & students that belongs to subjects
        $courseWithSubjectStudents = Course::with('subjects.students')
                                            ->get(); // Or FindOrFail

        return $courseWithSubjectStudents;
    }

    public function getSingleCourse(Course $course)
    {
        return $course;
    }

    public function getCourseSubjects($id)
    {
        // Get the course with all of his subjects
        $course = Course::with('subjects')->findOrFail($id);

        return $course;
    }

    public function getCourseStudents($id)
    {
        // Get the course with students
        $courseWithStudents = Course::with('students')->findOrFail($id);

        return $courseWithStudents;
    }

    
}
