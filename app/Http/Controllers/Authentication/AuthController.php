<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userData = User::all();
            return response()->json($userData);

        } catch (\Throwable $th) {
            return response()->json(['message'=> $th->getMessage()]);

            //TODO: Using Logger for error 
        }
    }

    /**
     *   Login
     */
    public function login(Request $request)
    {

    }


    /**
     * Show the form for creating a new resource.
     */
    public function registration(Request $request)
    {


        // Validate Request data
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required|max:150',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'role' => 'required'
            ]);


            // Validation fails then return errors
            if ($validated->fails()) {
                return response()->json(['error' => $validated->errors()], 422); // TODO: endivusile error handling
            }


            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => $request->password,
            ]);


            return response()->json(['status'=> 'success', 'message' => 'Registration successful'], 200);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function updateExistUserById(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyById(string $id)
    {
        //
    }
}
