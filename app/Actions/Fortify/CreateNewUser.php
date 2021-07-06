<?php

namespace App\Actions\Fortify;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'dni' => ['required', 'string', 'max:8', 'min:8'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'oficina' => ['required', 'gt:0'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $persona = Persona::create([
            'dni' => $input['dni'],
            'nombres' => $input['nombres'],
            'apellidos' => $input['apellidos'],
        ]);

        return User::create([
            'email' => $input['email'],
            'persona_id' => $persona->id,
            'oficina_id' => $input['oficina'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
