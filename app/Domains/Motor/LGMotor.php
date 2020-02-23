<?php

namespace App\Domains\Motor;

use App\Domains\Motor\Enums\Direction;
use App\Domains\Motor\Enums\DoorStatus;
use App\Domains\Motor\Enums\MotorStatus;

class LGMotor extends Motor
{
    public function __construct(Door $door)
    {
        parent::__construct($door);
    }

//    protected function moveLGMotor(Direction $direction)
    protected function moveMotor(Direction $direction)
    {
        dump("===== moveMotor 호출됨");
        dump("===== LG Motor 를 구동시킴");
        dump("===== direction 확인");
        dump($direction);
    }
}
