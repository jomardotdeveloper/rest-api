<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LRController extends APIController
{
    public function signin(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users,email|max:50',
            'password' => 'required|min:8'
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return $this->sendError($validated->messages()->all());
        }
        if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
            return $this->sendError(["Password is incorrect."]);
        $user = User::where("email", $request->get("email"))->first();
        if ($user->faculty) {
            if (!$user->can_login) {
                return $this->sendError(["Your account is still pending."]);
            }
        }
        return $this->sendResponse(new UserResource($user), "OK");
    }

    public function signup(Request $request)
    {
        $rules = [
            "number" => "required",
            "first" => "required",
            "last" => "required",
            "middle"  => "nullable",
            "extension"  => "nullable",
            "birthdate" => "required",
            "place" => "required",
            "sex" => "required",
            "civil" => "required",
            "height" => "required",
            "weight" => "required",
            "blood" => "required",
            "gsis"  => "nullable",
            "pagibig"  => "nullable",
            "philhealth"  => "nullable",
            "sss"  => "nullable",
            "tin"  => "nullable",
            "citizenship"  => "nullable",
            "rhouse"  => "nullable",
            "rstreet"  => "nullable",
            "rvillage"  => "nullable",
            "rbarangay" => "required",
            "rcity" => "required",
            "rprovince" => "required",
            "rzip" => "required",
            "phouse"  => "nullable",
            "pstreet"  => "nullable",
            "pvillage"  => "nullable",
            "pbarangay" => "required",
            "pcity" => "required",
            "pprovince" => "required",
            "pzip" => "required",
            "telephone"  => "nullable",
            "mobile"  => "nullable",
            "alternate"  => "nullable",
            "email" => "required|unique:users,email",
            "password" => ["required", "confirmed", Password::min(8)->letters()->numbers()->symbols()]
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return $this->sendError($validated->messages()->all());
        }
        $user = User::create([
            "email" => $request->get("email"),
            "password" => Hash::make($request->get("password"))
        ]);
        $user->save();
        $data = $request->all();
        $data["user_id"] = $user->id;
        $faculty = Faculty::create($data);
        $faculty->save();

        return $this->sendResponse($user, "OK");
    }
}
