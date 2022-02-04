<?php

namespace App\Actions\Forms;

use App\Models\{Category, Product};
use Illuminate\Contracts\Support\Responsable;

class ProductForm Implements Responsable
{
	private $view;
	private $product;

	public function __construct($view, Product $product)
	{
		$this->view = $view;
		$this->product = $product;
	}

	public function toResponse($request)
	{
		return view($this->view, [
            'product' => $this->product,
			'products' => $this->product->all(),
			'categories' => Category::orderByDesc('name')->get(),
            'trashed' => $this->product->countProductsTrashed,
	        'view'   => $request->routeIs('admin.products.edit') ? 'edit' : 'create',
	    ]);
	}
}
