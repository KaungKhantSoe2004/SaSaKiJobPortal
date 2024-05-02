<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Client;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
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
        Validator::make($input, [
            "signInName"=> "required|min:10|unique:users,name",
            "signInEmail"=>  "required|email|unique:users,email",
            "signInAge"=> "required",
            "signInPhone"=> "required|min:10|",
            "signInGender"=> "required",
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            "name"=> $input["signInName"],
            "email"=> $input['signInEmail'],
            "age"=> $input['signInAge'],
            "phone"=> $input['signInPhone'],
            "gender"=> $input['signInGender'],
            "jobs_filled"=> 0,
        //    "password_confirmation"=> $input->password_confirmation,
            'password' => Hash::make($input['password']),
        ]);
    }
}
