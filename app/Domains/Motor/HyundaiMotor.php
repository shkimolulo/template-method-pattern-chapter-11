<?php

namespace App\Domains\Motor;

use App\Domains\Motor\Enums\Direction;
use App\Domains\Motor\Enums\DoorStatus;
use App\Domains\Motor\Enums\MotorStatus;

class HyundaiMotor extends Motor
{
    public function __construct(Door $door)
    {
        parent::__construct($door);
    }

    protected function moveHyundaiMotor(Direction $direction)
    {
        dump("===== moveHyundaiMotor 호출됨");
        dump("===== Hyundai Motor 를 구동시킴");
        dump("===== direction 확인");
        dump($direction);
    }

    // move 메서드는 LGMotor 와 상이하므로 여기서 구현함
    public function move(Direction $direction) : void
    {
        $motorStatus = self::getMotorStatus();
        if ($motorStatus->is(MotorStatus::MOVING)) {
            return;
        }

        $doorStatus = $this->door->getDoorStatus();
        if ($doorStatus->is(DoorStatus::OPENED)) {
            $this->door->close();
        }

        self::moveHyundaiMotor($direction); // move() 내에서 이 구문 제외하면 LGMotor 와 동일
        $this->setMotorStatus(MotorStatus::MOVING());
    }
}
