<?php

namespace App\Helpers\Security;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use App\Exceptions\UnknownKeyException;

final class Configable
{
    public static function model(string $key)
    {
        return self::get('models', $key);
    }

    public static function table($key): string
    {
        return self::get('tables.' . $key);
    }

    public static function tables(): Collection
    {
        $tables = self::get('tables', []);

        return Collection::make($tables)->except('users');
    }

    public static function foreignKey(string $key): string
    {
        if (!$key) {
            throw new \Exception(sprintf('Foreign key %s not found', $key));
        }

        return self::get('foreign_keys', $key);
    }

    public static function isCache(): bool
    {
        return (bool) self::get('cache', true);
    }

    /**
     * @param  string  $key
     * @param  null  $default
     *
     * @return mixed
     */
    private static function get(string $key, $default = null)
    {
        if (Config::has('project.' . $key, $default)) {
            return Config::get('project.' . $key, $default);
        }

        throw new UnknownKeyException($key);
    }
}
