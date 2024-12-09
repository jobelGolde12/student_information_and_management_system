<?php

namespace App\Http\Controllers;

use App\Models\InstructorModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class instructorController extends Controller
{
    public function addInstructor(){
        return Inertia::render('AddInstructor');
        }
        public function addInstructorPost(Request $request){
            $request->validate([
                'name' => 'required|string|max:255',
                'dateofbirth' => 'required|date',
                'phonenumber' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|unique:users,password',
                'gender' => 'required|string|max:255',
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'instructor'
            ]);
            InstructorModel::create([
                'instructor_id' => $user->id,
                'dateofbirth' => $request->dateofbirth,
                'phonenumber' => $request->phonenumber,
                'gender' => $request->gender,
            ]);
    
        }
        public function addSubject(Request $request){
            $request->validate([
                'subject_name' => 'required|string|max:255'
            ]);
            SubjectModel::create($request->only('subject_name'));
        }
        public function addSubjectRoute(){
            $subjects = SubjectModel::all();
            return Inertia::render('instructor/ViewAllSubjects', [
                'subjects' => $subjects
            ]);
        }
        public function deleteSubject(Request $request, $id){
            $subject = SubjectModel::findOrFail($id);
            $subject->delete();

            
        }


}
