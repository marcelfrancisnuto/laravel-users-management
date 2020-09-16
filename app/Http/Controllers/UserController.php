<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Log;

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
            $user->role = "Standard";
            $user->email_verified_at = Carbon::now();
            $user->password = Hash::make($request->input('password'));

            if ($user->save()) {
                return response()->json(["data" => new UserResource($user), "success" => true]);
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
        try {
           $ids = explode(',', $id);

        foreach($ids as $i) {
            Log::debug($i);
            $user = User::findOrFail($i);

            if ($user) {
                $user->delete();
            }
        }
        
        return response()->json(["message" => "User/s deleted", "success" => true], 200);

        } catch (Exception $e) {
            return response()->json(["error" => "An error has occurred", "errors" => $e]);
        }
    }
}
