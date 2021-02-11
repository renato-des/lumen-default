<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all()->toJson();

        // return json_encode($series = [
        //     "nome" => [
        //         "Controller",
        //         "Grey's Anatomy",
        //         "Lost"
        //     ]
        // ]);
    }

    public function store(Request $request)
    {
        return response()
            ->json(
                Serie::create(['name' => $request->nome]),
                201
            );
    }

    public function show($id)
    {

        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json('', 204);
        }
        return response()->json($serie, 200);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $serie->fill($request);
        $serie->save();
        return response()->json($serie, 200);
    }
}
