<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthAPIController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validated();

        /** @var User $user */
        $user = User::whereEmail($data['email'])->first();

        if (! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => [(string) trans('validation.credentials')],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($data['token_name'])->plainTextToken,
        ], Response::HTTP_CREATED);
    }
}
