<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        return new UserCollection(User::paginate(5));
    }

    public function create(Request $request) {
        try {
            $user = new User;
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->address = $request->input('address');
            $user->postal_code = $request->input('postal_code');
            $user->phone_number = $request->input('phone_number');
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));

            if ($user->save()) {
                return response()->json(["message" => $user]);
            } else {
                return response()->json(["errors" => "An error has occurred"]);
            }
        } catch (Exception $e) {
            return response()->json(["errors" => "An error has occurred"]);
        }

    }

    public function view($id) {
        
        return new UserResource(User::findOrFail($id));
    }

    public function delete($id) {
        $user = User::findOrFail($id);

        if ($user) {
            if ($user->delete()) {
                return response()->json(["message" => "User has been deleted"], 200);
            }
        } else {
            return response()->json(["error" => "The requested resource was not found"]);
        }

        return response()->json(null);
    }
}
