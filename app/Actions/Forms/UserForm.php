<?php

namespace App\Actions\Forms;

use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use App\Models\Shared\{Country, Gender, Status};

class UserForm Implements Responsable
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
