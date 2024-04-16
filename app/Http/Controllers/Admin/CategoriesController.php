<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Actions\Forms\CategoryForm;
use App\Http\Requests\Category\{StoreCategoryRequest, UpdateCategoryRequest};

class CategoriesController extends BaseAdminController
{
    public function index(Request $request)
    {
        $categories = $this->category->listCategories($request);

        return view('admin.categories.index', [
            'categories' => $categories,
            'category' => $this->category,
            'trashed' => $this->category->countCategoriesTrashed,
            'view' => $this->hasRouteTrashOrIndex('admin.categories.trashed'),
            'text_pagination' => $this->category
                    ->getTextPaginations($categories, $categories->total(), 'categories')
        ]);
    }

    public function create()
    {
        return $this->edit(new Category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->createCategory();

        return redirect()->back()
            ->with('toast_success', trans('Category created with success!.'));
    }

    public function edit(Category $category)
    {
        return new CategoryForm('admin.categories.form', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->updateCategory($category);

        return redirect()
            ->route('admin.categories')
            ->with('toast_success', trans('Category updated with success!.'));
    }

    public function restore($id)
    {
        Category::withTrashed()
                ->where('id', $id)->first()
                ->restore();

        return redirect()->route('admin.categories.trashed', $id)
                ->with('toast_success', 'Category was restored with success!');
    }

    public function trash(Category $category)
    {
        $category->delete();

        return redirect()->back()
            ->with(['category' => $category])
            ->with('toast_success', 'Category "'.$category->name.'" was deleted with success!.');
    }

    public function destroy($id)
    {
        $this->category->onlyTrashed()
                    ->where('id', $id)
                    ->firstOrFail()->forceDelete();

        return redirect()
            ->route('admin.categories.trashed', $this->category->id)
            ->with('toast_success', 'Category was destroyed with success!.');
    }
}
