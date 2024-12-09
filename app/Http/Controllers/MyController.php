<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MyController extends Controller
{
    public function deleteUser(Request $request, $id){
        try{
            $user = User::findOrFail($id);
            $user->delete();
            return back()->with('success', 'user deleted');
        }catch(\Exception $e) {
            return back()->with('error', 'an error while deleting user');
        }
    }
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('success', 'Done');
    }
}
