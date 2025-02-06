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

    function addStudent(Request $req){
        $student = new Student;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->batch = $req->batch;
        $student->save();
        if($student->save()){
            return ['message' => 'Student Added Successfully'];
        }else{
            return ['message' => 'Student Not Added'];
        }
    }
}
