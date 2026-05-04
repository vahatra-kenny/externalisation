<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'prenom'=>'required',
            'email' => 'required|email|unique:users',
            'telephone'=>'required',
            'password' => 'required|min:6'
        ]);
       

     $user = User::create([
    'name' => $request->name,
    'prenom' => $request->prenom,
    'telephone' => $request->telephone,
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);


        return response()->json(['message' => 'Inscription OK']);
    }

   
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'message' => 'Utilisateur introuvable'
        ], 404);
    }

    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Mot de passe incorrect'
        ], 401);
    }

    return response()->json([
        'message' => 'Connexion réussie',
        'user' => $user
    ]);
}

}
