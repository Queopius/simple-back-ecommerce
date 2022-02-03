<?php

namespace App\Helpers\Security;

use Illuminate\Database\Eloquent\Model;

final class Securiteable
{
    public static function findPermission($permission)
    {
        return self::find('permission', $permission);
    }

    public static function findRole($role)
    {
        return self::find('role', $role);
    }

    public static function exist(string $config_model, $value)
    {
        $model = Configable::model($config_model);

        $value = trim($value);

        return $model::query()
            ->where('id', $value)
            ->orWhere('slug', $value)
            ->exists();
    }

    private static function find(string $config_model, $value): ?Model
    {
        $model = Configable::model($config_model);

        if ($value instanceof $model) {
            return $value;
        }

        $value = trim($value);

        return $model::query()
            ->where('id', $value)
            ->orWhere('slug', $value)
            ->first();
    }
}
