<?php

namespace App\Filters;


class CategoryFilter extends QueryFilter
{
    protected $aliases = [
        'date' => 'created_at',
    ];

    public function rules(): array
    {
        return [
            'search' => 'filled'
        ];
    }

    public function search($query, $search)
    {
        if ($search) {
            return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
        }
    }
}
