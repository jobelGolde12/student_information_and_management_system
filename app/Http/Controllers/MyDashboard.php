<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MyDashboard extends Controller
{
    public function index(){
    $users = User::all();
    if(Auth::user()->role === 'admin'){
     return Inertia::render('admin/Home', [
        'users' => $users
     ]);
    }else if(Auth::user()->role === 'superadmin'){
       $users = User::all();
      return Inertia::render('super/Home', [
         'users' => $users
      ]);
   }if(Auth::user()->role === 'instructor'){
      return Inertia::render('instructor/Home', [
         'users' => $users
      ]);
     }else if(Auth::user()->role === 'student'){
      $user = User::find(Auth::user()->id);
     return Inertia::render('student/Home', [
        'user' => $user
     ]);
    }else if(Auth::user()->role === 'user'){
      $user = User::find(Auth::user()->id);
     return Inertia::render('Dashboard', [
        'user' => $user
     ]);
    }

    }

    
}
