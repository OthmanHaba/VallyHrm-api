<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum GenderEnum: string
{
    use EnumValues;
    case Male = 'male';
    case Female = 'female';
}
