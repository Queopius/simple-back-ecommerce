<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Actions\Shared\Traits\{
    GetRouteTrashOrIndex
};

class BaseAdminController extends Controller
{
    use GetRouteTrashOrIndex;

    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }
}
