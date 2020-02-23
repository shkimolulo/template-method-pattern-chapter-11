<?php

namespace App\Domains\Motor;

use App\Domains\Motor\Enums\Direction;
use App\Domains\Motor\Enums\DoorStatus;
use App\Domains\Motor\Enums\MotorStatus;
use Illuminate\Database\Eloquent\Model;

abstract class Motor extends Model
{
    protected $door;
    private $motorStatus;

    public function __construct(Door $door)
    {
        parent::__construct();

        $this->door = $door;
        $this->motorStatus = MotorStatus::STOPPED();
    }

    public function getMotorStatus() : MotorStatus
    {
        return $this->motorStatus;
    }

    protected function setMotorStatus(MotorStatus $motorStatus) : void
    {
        $this->motorStatus = $motorStatus;
    }

    // HyundaiMotor 와 LGMotor 의 move 메서드에서 공통되는 부분만을 가짐
    public function move(Direction $direction)
    {
        $motorStatus = self::getMotorStatus();
        if ($motorStatus->is(MotorStatus::MOVING)) {
            return;
        }

        $doorStatus = $this->door->getDoorStatus();
        if ($doorStatus->is(DoorStatus::OPENED)) {
            $this->door->close();
        }

        $this->moveMotor($direction);
        $this->setMotorStatus(MotorStatus::MOVING());
    }

    abstract protected function moveMotor(Direction $direction);
}
