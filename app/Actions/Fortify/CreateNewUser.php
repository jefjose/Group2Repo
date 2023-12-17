<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;
use Laravel\Jetstream\Jetstream;

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
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => [
                'required',
                'numeric',
                'unique:users',
                function ($attribute, $value, $fail) {
                    $allowedPrefixes = [
                        '0817','0895','0896','0897','0898','0905','0906','0907','0908','0909','0910','0912','0915','0916','0917','0918','0919',
                        '0920','0921','0922','0923','0924','0925','0926','0927','0928','0929','0930','0931','0932','0933','0934','0935','0936',
                        '0937','0938','0939','0940','0941','0942','0943','0945','0946','0947','0948','0949','0950','0951','0953','0954','0955',
                        '0956','0961','0965','0966','0967','0973','0974','0975','0976','0977','0978','0979','0991','0992','0993','0994','0995',
                        '0996','0997','0998','0999','09173','09175','09176','09178','09253','09255','09256','09257','09258',
                    ];

                    $isValidPrefix = false;

                    foreach ($allowedPrefixes as $prefix) {
                        if (strpos($value, $prefix) === 0 && strlen($value) === 11) {
                            $isValidPrefix = true;
                            break;
                        }
                    }

                    if (!$isValidPrefix) {
                        $fail('The phone number is not valid.');
                    }
                },
            ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = [];

            if ($errors->has('name')) {
                $message['name'] = $errors->first('name');
            }

            if ($errors->has('email')) {
                $message['email'] = $errors->first('email');
            }

            if ($errors->has('phone_number')) {
                $message['phone_number'] = $errors->first('phone_number');
            }

            if ($errors->has('password')) {
                $message['password'] = $errors->first('password');
            }

            throw new ValidationException($validator, redirect()->back()->with('error', $message)->withErrors($validator)->withInput());
        }

        return User::create([
            'name' => ucwords($input['name']),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone_number' => $input['phone_number'],
        ]);
    }
}
