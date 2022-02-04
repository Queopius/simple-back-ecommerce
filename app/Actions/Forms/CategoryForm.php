<?php

namespace App\Actions\Forms;

use App\Models\Category;
use Illuminate\Contracts\Support\Responsable;

class CategoryForm Implements Responsable
{
	private $view;
	private $category;

	public function __construct($view, Category $category)
	{
		$this->view = $view;
		$this->category = $category;
	}

	public function toResponse($request)
	{
		return view($this->view, [
            'category' => $this->category,
            'trashed' => $this->category->countCategoriesTrashed,
	        'view'   => $request->routeIs('admin.categories.edit') ? 'edit' : 'create',
	    ]);
	}
}
