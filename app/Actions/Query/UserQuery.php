<?php

namespace App\Actions\Query;

use App\Actions\Query\QueryBuilder;

class UserQuery extends QueryBuilder
{
	public function findByEmail($email)
    {
        return $this->where(compact('email'))->first();
    }
}
