<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends APIController
{
    public function getAll($id = null)
    {
        if ($id != null) {
            return EducationResource::collection(Education::where("user_id", $id)->get()->all());
        }

        return EducationResource::collection(Education::all());
    }

    public function create(Request $request)
    {
        $res = Education::create($request->all());
        $res->save();
        return $this->sendResponse(new EducationResource($res), "OK");
    }

    public function edit(Request $request, $id)
    {
        $res = Education::find($id);
        $res->fill($request->all());
        $res->save();
        return $this->sendResponse(new EducationResource($res), "OK");
    }

    public function delete($id)
    {
        $res = Education::find($id);
        $res->delete();
        return $this->sendResponse(null, "OK");
    }
}
