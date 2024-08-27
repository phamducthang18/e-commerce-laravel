<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'The provided credentials do not match our records.'
            ], 401);
        }

        $user = Auth::user();

        // Tạo token và lấy giá trị plainTextToken
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;
       

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_at'   => null,
        ]);
    }
}
