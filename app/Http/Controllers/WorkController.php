<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkResource;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends APIController
{
    public function getAll($id = null)
    {
        if ($id != null) {
            return WorkResource::collection(Work::where("user_id", $id)->get()->all());
        }

        return WorkResource::collection(Work::all());
    }

    public function create(Request $request)
    {
        $res = Work::create($request->all());
        $res->save();
        return $this->sendResponse(new WorkResource($res), "OK");
    }

    public function edit(Request $request, $id)
    {
        $res = Work::find($id);
        $res->fill($request->all());
        $res->save();
        return $this->sendResponse(new WorkResource($res), "OK");
    }

    public function delete($id)
    {
        $res = Work::find($id);
        $res->delete();
        return $this->sendResponse(null, "OK");
    }
}
