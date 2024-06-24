<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum SocialStatus: string
{
    use EnumValues;

    case Single = 'single';
    case Married = 'married';
    case Divorced = 'divorced';
    case Widowed = 'widowed';

}
