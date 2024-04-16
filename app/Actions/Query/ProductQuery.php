<?php

namespace App\Actions\Query;


class ProductQuery extends QueryBuilder
{
    public function findByName($name)
    {
        return $this->where(compact('name'))->first();
    }
}
