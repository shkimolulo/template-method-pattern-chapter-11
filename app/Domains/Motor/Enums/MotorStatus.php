<?php

namespace App\Domains\Motor\Enums;

use MabeEnum\Enum;

class MotorStatus extends Enum
{
    const MOVING = 'moving';
    const STOPPED = 'stopped';
}
