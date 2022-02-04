<?php

namespace App\Actions\Category\Traits;

trait GetCategoryData
{
    protected function data()
    {
        return [
            'name'              => $this->name,
            'description'       => $this->description,
        ];
    }
}
