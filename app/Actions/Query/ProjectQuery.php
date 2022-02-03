<?php

namespace App\Actions\Query;

use App\Actions\Query\QueryBuilder;
use App\Actions\Project\Constants\Status;

class ProjectQuery extends QueryBuilder
{
	public function findByName($name)
    {
        return $this->where(compact('name'))->first();
    }
}
