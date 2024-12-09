<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class SuperAdmin extends Controller
{
    public function createAdmin(){
        return Inertia::render('super/AddAdmin');
    }

    public function createAdminPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:unique,users',
            'password' => 'required|string|max:255'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return Inertia::render('super/AddAdmin');
    }
}
