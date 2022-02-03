<?php

namespace App\Actions\User\Traits;

trait GetUserData
{
    protected function data()
    {
        return [
            'username'              => $this->username,
            'first_name'            => $this->first_name,
            'last_name'             => $this->last_name,
            'email'                 => $this->email,
            'password'              => $this->password,
            'avatar'                => $this->avatar,
        ];
    }
}
