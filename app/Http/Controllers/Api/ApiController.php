<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //Register API (POST)
    public function register(Request $request){
        // Data validation
        $request->validate([
            "name"=> "required",
            "email" => "required|email|unique:users",
            'password' => [
                'required',
                'min:6',           // Minimum length of 6 characters
                'max:15',           // Maximum length of 8 characters
                'regex:/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]+$/u', // At least one uppercase and one lowercase letter
            ],
        ]);

        // Add to database
        // User::create([
        //     "name"=> $request->name,
        //     "email" =>$request->email,
        //     "password" => Hash::make($request->password),
        //     "phone" =>$request->phone,
        // ]);
    
        return response()->json([
            "status" => true,
            "message" => "User Registered Successfully"
        ]);
    }
}
