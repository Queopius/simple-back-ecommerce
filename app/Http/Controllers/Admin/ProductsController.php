<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Actions\Forms\ProductForm;
use App\Http\Requests\Product\{StoreProductRequest, UpdateProductRequest};

class ProductsController extends BaseAdminController
{
    public function index(Request $request)
    {
        $products = $this->product->listProducts($request);

        return view('admin.products.index', [
            'products' => $products,
            'product' => $this->product,
            'trashed' => $this->product->countProductsTrashed,
            'view' => $this->hasRouteTrashOrIndex('admin.products.trashed'),
            'text_pagination' => $this->product
                    ->getTextPaginations($products, $products->total(), 'products')
        ]);
    }

    public function create()
    {
        return $this->edit(new Product);
    }

    public function store(StoreProductRequest $request)
    {
        $request->createProduct();

        return redirect()->back()
            ->with('toast_success', trans('Product created with success!.'));
    }

    public function edit(Product $product)
    {
        return new ProductForm('admin.products.form', $product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->updateProduct($product);

        return redirect()
            ->route('admin.products')
            ->with('toast_success', trans('Product updated with success!.'));
    }

    public function restore($id)
    {
        Product::withTrashed()
                ->where('id', $id)->first()
                ->restore();

        return redirect()->route('admin.products.trashed', $id)
                ->with('toast_success', 'Product was restored with success!');
    }

    public function trash(Product $product)
    {
        $product->delete();

        return redirect()->back()
            ->with(['product' => $product])
            ->with('toast_success', 'Product "'.$product->productname.'" was deleted with success!.');
    }

    public function destroy($id)
    {
        $this->product->onlyTrashed()
                    ->where('id', $id)
                    ->firstOrFail()->forceDelete();

        return redirect()
            ->route('admin.products.trashed', $this->product->id)
            ->with('toast_success', 'Product was destroyed with success!.');
    }
}
