<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        // Get Subject and course that belongs to, also the students on the subject
        $subjects = Subject::with(['course','students'])->get();


        return $subjects;
    }

    public function getSingleSubject(Subject $subject)
    {
        // Route model binding
        return $subject;
    }

    public function getSubjectCourse($id)
    {
        // Get Subject and course that belongs to, also the students on the subject
        $subjects = Subject::with(['course'])->findOrFail($id);


        return $subjects;
    }

    public function getSubjectStudents($id)
    {

        // Get single subject with all students for that subject
        $singleSubjectWithStudent = Subject::with('students')->findOrFail($id);

        return $singleSubjectWithStudent;
    }
}

