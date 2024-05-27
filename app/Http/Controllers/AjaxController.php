<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function index()
    {

        return view('students.index');
    }

    public function getStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function addStudent(Request $request)
    {
        $allData = $request->all();
        Student::create($allData);
        return response()->json(['success' => 'Data Added Successfully']);
    }

    public function deleteStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->delete();
        return response()->json(['success' => 'Data Deleted Successfully']);
    }
}
