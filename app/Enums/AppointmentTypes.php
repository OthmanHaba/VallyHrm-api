<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum AppointmentTypes: string
{
    use EnumValues;

    case Appointment = 'appointment';
    case Contract = 'contract';

}
