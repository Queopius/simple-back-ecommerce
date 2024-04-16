<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Actions\Query\CategoryQuery;
use App\Actions\Shared\Traits\GetTextPaginations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Category extends Model
{
    use HasFactory, SoftDeletes, GetTextPaginations;

    protected $guarded = [];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new CategoryQuery($query);
    }

    public function listRelationships()
    {
        return [
            //
        ];
    }

    public function listCategories($request)
    {
        return $this->query()
                ->with($this->listRelationships())
                ->onlyTrashedIf(request()->routeIs('admin.categories.trashed'))
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryTrashed()
    {
        return $this->with('category')->onlyTrashed();
    }

    public function getCountCategoriesTrashedAttribute()
    {
        return $this->categoryTrashed()->get()->count();
    }
}
