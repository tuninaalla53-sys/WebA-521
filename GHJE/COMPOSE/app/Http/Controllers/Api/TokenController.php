<?php
// app/Http/Controllers/Api/TokenController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TokenController extends Controller
{
    public function createToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
            'abilities' => 'array'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $abilities = $request->abilities ?: ['*'];
        
        $token = $user->createToken($request->device_name, $abilities)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
            'abilities' => $abilities
        ]);
    }

    public function revokeTokens(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'All tokens revoked successfully'
        ]);
    }

    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }
}