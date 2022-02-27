<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        $validatedData = request()->validate([
            'mobile_number' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('mobile_number', request()->mobile_number)->first();
        if(!$user)
        {
            return response()->json([
                'errors' => ['mobile_number' => "mobile number not registred"],
            ], 422);
        }

        if(Hash::check(request()->password, $user->password))
        {
            Auth::login($user);

            return response()->json(['success' => true, 'message' => 'Loggedin Successfully']);
        }

        return response()->json([
            'errors' => ['password' => "password doesn't match"],
        ], 422);
    }

    public function registration()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'mobile_number' => 'required|unique:users,mobile_number',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $newuser = new User();
        $newuser->name = request()->name;
        $newuser->mobile_number = request()->mobile_number;
        $newuser->email = request()->email;
        $newuser->password = Hash::make(request()->password);
        $newuser->save();

        Auth::login($newuser);
        return response()->json(['success' => true, 'message' => 'Registration Successful.']);
    }
}
