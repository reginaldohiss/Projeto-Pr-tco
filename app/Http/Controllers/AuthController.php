<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
            return response()->json(['validated' => false, 'message' => 'As credenciais fornecidas estão incorretas.']);

        return response()->json([
            'validated' => true,
            'nome' => $user->name,
            'token' => $user->createToken('token')->plainTextToken,
            'message' => 'Login realizado com sucesso.',
            'redirect' => route('home')
        ], 200);
    }
}
