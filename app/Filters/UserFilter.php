<?php

namespace App\Filters;

use App\Filters\QueryFilter;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Actions\User\Constants\Status;

class UserFilter extends QueryFilter
{
    protected $aliases = [
        'date' => 'created_at',
        //'login' => 'last_login_at',
    ];

    public function rules(): array
    {
        return [
            'search'      => 'filled',
            'from'        => 'filled|date_format:d/m/Y',
            'to'          => 'filled|date_format:d/m/Y',
            'departments' => 'array|exists:departments,id',
            'roles'       => 'array|exists:roles,id',
            //'email_verified_at'    => 'in:verified,not_verified',
        ];
    }

    public function search($query, $search)
    {
        if ($search) {
            return $query->whereRaw('CONCAT(first_name, ", ",last_name) LIKE ? ', "%{$search}%")
                    ->orWhere('username', 'LIKE', "%{$search}%")
                    ->orWhere('id', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('profession', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhereHas('country', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('gender', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
        }
    }

    public function status($query, $status)
    {
        if ($status) {
            return $query->where('status', $status == 'status');
        }
    }

    public function departments($query, $departments)
    {
        $subquery = DB::table('collaborator_departments AS c')
            ->selectRaw('COUNT(`c`.`id`)')
            ->whereColumn('c.collaborator_id', 'users.id')
            ->whereIn('department_id', $departments);

        $query->whereQuery($subquery, count($departments));
    }

    public function roles($query, $roles)
    {
        $subquery = DB::table('role_user AS s')
            ->selectRaw('COUNT(`s`.`id`)')
            ->whereColumn('s.user_id', 'users.id')
            ->whereIn('role_id', $roles);

        $query->whereQuery($subquery, count($roles));
    }

    // public function email_verified_at($query, $email_verified_at)
    // {
    //     if ($email_verified_at == date()) {
    //         return $query->where('email_verified_at', date());
    //     }

    //     if ($email_verified_at == null) {
    //         return $query->where('email_verified_at', null);
    //     }
    // }

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
