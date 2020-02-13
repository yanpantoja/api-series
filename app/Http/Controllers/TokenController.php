<?php
namespace App\Http\Controllers;


use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if(is_null($user) || Hash::check($request->password, $user->password)){
            return response()->json('Usuário ou senha incorretos', 401);
        }


        //$token = JWT::encode(['email' => $emailUserFind], env('JWT_KEY'));

        return [
            'access_token' => $token
        ];
    }
}
