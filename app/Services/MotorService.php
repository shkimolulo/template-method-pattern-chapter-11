<?php

namespace App\Services;

use App\Domains\Door\Door;
use App\Domains\Door\HyundaiMotor;
use App\Domains\Motor\Enums\Direction;

class MotorService
{
    public function main() {
        $door = new Door();
        $hyundaiMotor = new HyundaiMotor($door);
        $hyundaiMotor->move(Direction::UP());
    }
}
