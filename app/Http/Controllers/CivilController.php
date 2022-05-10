<?php

namespace App\Http\Controllers;

use App\Http\Resources\CivilResource;
use App\Models\Civil;
use Illuminate\Http\Request;

class CivilController extends APIController
{
    //
    public function getAll($id = null)
    {
        if ($id != null) {
            return CivilResource::collection(Civil::where("user_id", $id)->get()->all());
        }
        return CivilResource::collection(Civil::all());
    }

    public function create(Request $request)
    {
        $res = Civil::create($request->all());
        $res->save();
        return $this->sendResponse(new CivilResource($res), "OK");
    }

    public function edit(Request $request, $id)
    {
        $res = Civil::find($id);
        $res->fill($request->all());
        $res->save();
        return $this->sendResponse(new CivilResource($res), "OK");
    }

    public function delete($id)
    {
        $res = Civil::find($id);
        $res->delete();
        return $this->sendResponse(null, "OK");
    }
}
