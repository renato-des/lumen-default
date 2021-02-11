<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();

        // return json_encode($series = [
        //     "nome" => [
        //         "Controller",
        //         "Grey's Anatomy",
        //         "Lost"
        //     ]
        // ]);
    }
}
