<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, Product};
use App\Actions\Shared\Traits\{
    GetRouteTrashOrIndex
};

class BaseAdminController extends Controller
{
    use GetRouteTrashOrIndex;

    protected $user;
    protected $product;

    public function __construct(User $user, Product $product)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->product = $product;
    }
}
