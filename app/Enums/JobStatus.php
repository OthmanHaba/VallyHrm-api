<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum JobStatus: string
{
    use EnumValues;

    case Active = 'active';
    case Inactive = 'inactive';

}
