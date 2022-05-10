<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends APIController
{
    public function getAll($id = null)
    {
        if ($id != null) {
            return ProgramResource::collection(Program::where("user_id", $id)->get()->all());
        }

        return ProgramResource::collection(Program::all());
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $path = Storage::putFile("public/certificate", $request->file("cert"));
        $path = Storage::url($path);
        $data["cert"] = $path;
        $res = Program::create($data);
        $res->save();
        return $this->sendResponse(new ProgramResource($res), "OK");
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        if ($request->file("cert")) {
            $path = Storage::putFile("public/certificates", $request->file("cert"));
            $path = Storage::url($path);
            $data["cert"] =  $path;
        }
        $res = Program::find($id);
        $res->fill($data);
        $res->save();
        return $this->sendResponse(new ProgramResource($res), "OK");
    }

    public function delete($id)
    {
        $res = Program::find($id);
        $res->delete();
        return $this->sendResponse(null, "OK");
    }
}
