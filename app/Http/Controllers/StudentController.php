<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function list(){
        $students = Student::all();
        
        return ['message' => "Success",'students' => $students];
    }
}
