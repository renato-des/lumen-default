<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function buscaPorSeries(int $id, Request $request)
    {
        $episodios = Episodio::query()
            ->where('serie_id', '=', $id)
            ->paginate($request->per_page);

        return response()->json($episodios, 200);
    }
}
