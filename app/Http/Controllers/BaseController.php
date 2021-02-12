<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $classe;

    public function index(Request $request)
    {
        // $offset = ($request->page - 1) * $request->per_page;
        // dd($request->per_page);
        // $series = $this->classe::query()
        //     ->offset($offset)
        //     ->limit($request->per_page)
        //     ->get();
        $series = $this->classe::paginate($request->per_page);
        if (is_null($series)) {
            return response()->json('', 204);
        }
        return response()
            ->json($series, 200);
    }

    public function store(Request $request)
    {
        return response()
            ->json(
                $this->classe::create($request->all()),
                201
            );
    }

    public function show($id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json('', 204);
        }
        return response()->json($recurso, 200);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if (!is_null($recurso)) {
            $recurso->fill($request->all());
            $recurso->save();
            return response()->json($recurso, 200);
        }
        return response()->json(['erro' => 'Recurso procurado inexistente'], 404);
    }

    public function destroy($id)
    {
        $recursosRemovidos = $this->classe::destroy($id);

        if ($recursosRemovidos === 0) {
            return response()->json(['message' => 'Recurso procurado inexistente!'], 404);
        }
        return response()->json(['message' => 'Recurso excluído com sucesso!'], 200);
    }
}
