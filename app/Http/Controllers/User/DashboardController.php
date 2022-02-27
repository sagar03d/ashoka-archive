<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function change($id)
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'mobile_number' => 'required|unique:users,mobile_number,'.$id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = request()->name;
        $user->email = request()->email;
        $user->mobile_number = request()->mobile_number;
        $user->update();

        return response()->json(['success' => true, 'message' => 'User information updated']);
    }
}
