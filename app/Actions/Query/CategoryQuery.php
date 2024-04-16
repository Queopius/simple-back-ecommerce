<?php

namespace App\Actions\Query;


class CategoryQuery extends QueryBuilder
{
    public function findByName($name)
    {
        return $this->where(compact('name'))->first();
    }
}
