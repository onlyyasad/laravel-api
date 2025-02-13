<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    function list(){
        $students = Student::all();

        return ['message' => "Success",'students' => $students];
    }

    function addStudent(Request $req){
        $rules = array(
            "name" => "required | min:2 | max:20",
            "email" => "email | required",
            "phone" => "required",
            "batch" => "required | min:4 | max:4"
        );
        $validation = Validator::make($req->all(), $rules);

        if($validation->fails()){
            return $validation->errors();
        }else{
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

    function updateStudent(Request $req, $id){
        $student = Student::find($id);

        if(!$student){
            return ['message' => 'Student Not Found'];
        }

        $student->name = $req->name;
        $student->save();
        if($student->save()){
            return ['message' => 'Student Updated Successfully'];
        }else{
            return ['message' => 'Student Not Updated'];
        }
    }

    function deleteStudent($id){
        $student = Student::destroy($id);
        if($student){
            return ['message' => 'Student deleted successfully!'];
        }else{
            return ['message' => 'Student not deleted'];
        }
    }

    function searchStudent($name){
        $student = Student::where('name', 'like', "%$name%")->get();
        if($student){
            return ["result" => $student];
        }else{
            return ["message" => "No student found for the name $name"];
        }
    }
}
