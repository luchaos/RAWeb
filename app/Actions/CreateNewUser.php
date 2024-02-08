<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use App\Support\Rules\CtypeAlnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => [
                'required',
                'unique:UserAccounts,User',
                'min:4',
                'max:20',
                new CtypeAlnum(),
            ],
            'email' => [
                'required',
                'email:filter',
                'confirmed',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', Password::default(), 'confirmed', 'different:username'],
            'terms' => ['accepted', 'required'],
        ])->validate();

        return User::create([
            'User' => $input['username'],
            'EmailAddress' => $input['email'],
            'Password' => Hash::make($input['password']),
        ]);
    }
}
