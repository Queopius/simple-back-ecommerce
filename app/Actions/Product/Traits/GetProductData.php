<?php

namespace App\Actions\Product\Traits;

trait GetProductData
{
    protected function data()
    {
        return [
            'name'              => $this->name,
            'description'       => $this->description,
            'price'             => $this->price,
            'photo'             => $this->photo,
            'category_id'       => $this->category_id,
        ];
    }
}
