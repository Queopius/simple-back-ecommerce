<?php

namespace App\Actions\Forms;

use App\Models\User;
use Illuminate\Contracts\Support\Responsable;

class UserForm implements Responsable
{
    private $view;
    private $user;

    public function __construct($view, User $user)
    {
        $this->view = $view;
        $this->user = $user;
    }

    public function toResponse($request)
    {
        return view($this->view, [
            'user' => $this->user,
            'users' => $this->user->all(),
            'trashed' => $this->user->countUsersTrashed,
            'view'   => $request->routeIs('admin.users.edit') ? 'edit' : 'create',
        ]);
    }
}
