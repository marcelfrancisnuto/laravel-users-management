<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;


use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        return new UserCollection(User::paginate(5));
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
