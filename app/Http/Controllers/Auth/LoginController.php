<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        
        $credentials = $request->only('email', 'password');
        
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                
                'message' => 'Tài khoản hoặc mật khẩu không đúng.'
            ], 401);
        $user = $request->user();
        
        $roles = $user->roles->pluck('name')->toArray();
        $tokenResult = $user->createToken('Personal Access Token',$roles);
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'user' => Auth::user(),
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
