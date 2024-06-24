<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum EmployeeStatus: string
{
    use EnumValues;
    case Active = 'active';
    case Inactive = 'inactive';
    case OnVacation = 'on_vacation';
    case OnSickLeave = 'on_sick_leave';
    case OnMaternityLeave = 'on_maternity_leave';

}
