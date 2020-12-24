<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store() {
        $r=request();
        $image=$r->file('studentPhoto');  
        $image->move('images',$image->getClientOriginalName());             
        $imageName=$image->getClientOriginalName(); 

        $addStudent=Student::create([
            'id'=>$r->ID,
            'stuName'=>$r->name,
            'stuEmail'=>$r->email,
            'stuAddress'=>$r->address,            
            'stuPhoto'=>$imageName,
            'stuPhone'=>$r->phone,        
        ]);
        Return view('insertStudent');
    }

    public function show(){
        $students=Student::all();
        return view('showStudent')->with('students',$students);
    }
}
