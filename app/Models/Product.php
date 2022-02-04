<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Actions\Query\ProductQuery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Prunable;
use App\Actions\Shared\Traits\GetNumberFormat;
use App\Actions\Shared\Traits\GetTextPaginations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{SoftDeletes, Model};

class Product extends Model
{
    use HasFactory,
        SoftDeletes,
        GetNumberFormat,
        Prunable,
        GetTextPaginations;

    protected $guarded = [];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new ProductQuery($query);
    }

    public function listRelationships()
    {
        return [
            //
        ];
    }

    public function listProducts($request)
    {
        return $this->query()
                ->with($this->listRelationships())
                ->onlyTrashedIf(request()->routeIs('admin.products.trashed'))
                ->applyFilters()
                ->orderByDesc('created_at')
                ->paginate($request->per_page);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function getPhotoPathAttribute()
    {
        if ($this->photo) {
            return asset(Storage::url('products/'.$this->photo));
        }

        return url('uploads/product/images/default/default-image.jpg');
    }

    public function getPriceFormatedAttribute()
    {
        return $this->amount($this->price);
    }

    public function setPriceAttribute($price)
    {
        return $this->attributes['price'] = $price;
    }

    public function setPhotoAttribute($photo)
    {
        if ($photo)
        {
            Storage::disk('photos')->delete($this->photo);

            $fileNameExtension = $photo->getClientOriginalName();
            $fileName = pathinfo($fileNameExtension, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'. uniqid($this->id) .'_'.time().'.'.$extension;
            $path = $photo->storeAs('public/products', $fileNameToStore);

            $this->attributes['photo'] = $fileNameToStore;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productTrashed()
    {
        return $this->with('product')->onlyTrashed();
    }

    public function getCountProductsTrashedAttribute()
    {
        return $this->productTrashed()->get()->count();
    }
}
