<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacultyResource;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends APIController
{

    public function getData()
    {
        return FacultyResource::collection(Faculty::all());
    }

    public function getDataById($id)
    {
        return FacultyResource::collection(Faculty::where("id", $id)->get()->all());
    }

    public function accept($id)
    {
        $faculty = Faculty::find($id);
        $user = User::find($faculty->user_id);
        $user->can_login = true;
        $user->save();
        return $this->sendResponse(null, "OK");
    }

    public function refuse($id)
    {
        $faculty = Faculty::find($id);
        $user = User::find($faculty->user_id);
        $user->can_login = false;
        $user->save();
        return $this->sendResponse(null, "OK");
    }

    public function update(Request $request, $id)
    {
        $faculty = Faculty::find($id);
        $faculty->fill($request->all());
        $faculty->save();
        return $this->sendResponse(new FacultyResource($faculty), "OK");
    }

    public function profile(Request $request)
    {
        $path = Storage::putFile("public/profile", $request->file("photo"));
        $path = Storage::url($path);
        $profile = Faculty::find($request->get("id"));
        $profile->picture = $path;
        $profile->save();
        return $this->sendResponse(new FacultyResource($profile), "OK");
    }
}
