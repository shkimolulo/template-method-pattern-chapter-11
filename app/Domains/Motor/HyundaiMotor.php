<?php

namespace App\Domains\Motor;

use App\Domains\Motor\Enums\Direction;

class HyundaiMotor extends Motor
{
    public function __construct(Door $door)
    {
        parent::__construct($door);
    }

//    protected function moveHyundaiMotor(Direction $direction)
    protected function moveMotor(Direction $direction)
    {
        dump("===== moveMotor 호출됨");
        dump("===== Hyundai Motor 를 구동시킴");
        dump("===== direction 확인");
        dump($direction);
    }
}
