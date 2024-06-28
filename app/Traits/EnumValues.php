<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait EnumValues
{
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getTranslatedValues(): array
    {
        $className = Str::snake(class_basename(static::class));

        return array_map(function ($value) use ($className) {
            return __("enums.$className.$value");
        }, self::getValues());
    }

    public static function getValueFromTranslatedValue($value): string
    {
        $className = Str::snake(class_basename(static::class));

        return __("enums.$className.$value");
    }
}
