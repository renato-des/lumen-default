<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // $usuario = User::where('email', $request->email);
        $usuario = User::all()->toJson();


        dd($usuario);

        // return response()->json($usuario->email, 404);



        if (
            is_null($usuario) &&
            !Hash::check($request->password, $usuario->password)
        ) {
            return response()->json('', 401);
        }

        $token = JWT::encode(
            ['email' => $request->email],
            env('JWT_KEY')
        );

        return ['access_token' => $token];
    }
}
