<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
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
        $validationText = ['password.regex' => "password must contain capital letters,lower letters ,numbers and special characters"];
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phnumber' => ['required', 'string', 'max:255'],
            'password' =>["required","min:8","regex:/[A-Z]/",
                        "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/",
                        "confirmed","string"
                        ],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],$validationText)->validate();

       return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'address' => $input['address'],
            'phnumber' => $input['phnumber'],
            'password' => Hash::make($input['password']),
        ]);

    }
}
