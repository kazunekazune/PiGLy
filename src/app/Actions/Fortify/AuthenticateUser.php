<?php

namespace App\Actions\Fortify;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class AuthenticateUser
{
    /**
     * Validate and authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function authenticate(Request $request): void
    {
        // フォームリクエストでバリデーション
        $loginRequest = new LoginRequest();
        $loginRequest->merge($request->all());
        $loginRequest->validateResolved();

        $user = Auth::getProvider()->retrieveByCredentials([
            Fortify::username() => $request->email,
        ]);

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                Fortify::username() => [trans('auth.failed')],
            ]);
        }

        Auth::login($user);
    }
}
