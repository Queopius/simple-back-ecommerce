<?php

namespace App\Actions\Query;

use App\Actions\Query\QueryBuilder;

class ProductQuery extends QueryBuilder
{
	public function findByName($name)
    {
        return $this->where(compact('name'))->first();
    }
}
