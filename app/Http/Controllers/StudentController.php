<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function addStudent(){
    return Inertia::render('AddStudent');
    }

    public function addStudentPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|unique:users,password',
            'enrollment_status' => 'required|string|max:255',
            'student_year' => 'required|string|max:255',
            'gender' => 'required|string|max:255'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student'
        ]);
        StudentInfo::create([
            'user_id' => $user->id,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'enrollment_status' => $request->enrollment_status,
            'student_year' => $request->student_year,
            'gender' => $request->gender,
        ]);

    }
}
