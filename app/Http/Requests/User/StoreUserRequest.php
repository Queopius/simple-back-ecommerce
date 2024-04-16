<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Actions\User\Traits\GetUserData;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    use GetUserData;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username'              => ['required', 'string', 'max:60'],
            'first_name'            => ['required', 'string', 'max:60'],
            'last_name'             => ['required', 'string', 'max:60'],
            'email'                 => ['required', 'email:rfc,dns', 'regex:/^.+@.+$/i'],
            'password'              => ['nullable', Password::defaults()]
        ];

        if ($this->get('avatar')) {
            $rules = array_merge($rules, ['avatar' => 'nullable|image|max:2048']);
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'        => 'We need to know your e-mail address!',
            'password.required'     => 'The password field is required.',
            'username.required'     => 'The username field is required',
            'first_name.required'   => 'The first name field is required',
            'last_name.required'    => 'The last name field is required',
        ];
    }



    public function createUser()
    {
        DB::transaction(function () {
            $user = User::forceCreate($this->data());
            $user->save();

            $user->markEmailAsVerified();

            if (!$user) {
                Log::channel('management')
                    ->error("Error creating User: ".$user->username);
            }

            Log::channel('management')
                ->info('User "' .$user->username. '" has been created with success.');
        });
    }
}
