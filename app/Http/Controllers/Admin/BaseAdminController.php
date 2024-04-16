<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Product, Review, User};
use App\Actions\Shared\Traits\{
    GetRouteTrashOrIndex
};

class BaseAdminController extends Controller
{
    use GetRouteTrashOrIndex;

    protected $user;

    protected $product;

    protected $category;

    protected $review;

    public function __construct(User $user, Product $product, Category $category, Review $review)
    {
        $this->middleware('auth');

        $this->user = $user;
        $this->product = $product;
        $this->category = $category;
        $this->review = $review;
    }
}
