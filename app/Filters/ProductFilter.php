<?php

namespace App\Filters;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductFilter extends QueryFilter
{
    protected $aliases = [
        'date' => 'created_at',
    ];

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'contacts'  => 'array|exists:contacts,id',
            'from'   => 'date_format:d/m/Y',
            'to'     => 'date_format:d/m/Y',
        ];
    }

    public function search($query, $search)
    {
        if ($search) {
            return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('priority', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', '%{$search}%');
                    });
        }
    }

    public function collaborators($query, $collaborators)
    {
        if ($collaborators) {
            $subquery = DB::table('collaborator_project AS c')
                ->selectRaw('COUNT(`c`.`id`)')
                ->whereColumn('c.project', 'projects.id')
                ->whereIn('collaborator_id', $collaborators);

            $query->whereQuery($subquery, count($collaborators));
        }
    }

    public function from($query, $date)
    {
        if ($date) {
            $date = Carbon::createFromFormat('d/m/Y', $date);

            $query->whereDate('created_at', '>=', $date);
        }
    }

    public function to($query, $date)
    {
        if ($date) {
            $date = Carbon::createFromFormat('d/m/Y', $date);

            $query->whereDate('created_at', '<=', $date);
        }
    }
}
