<?php

namespace App\Domains\Motor;

use App\Domains\Motor\Enums\Direction;
use App\Domains\Motor\Enums\MotorStatus;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Motor\Enums\DoorStatus;

class HyundaiMotor extends Model
{
    private $door;
    private $motorStatus;

    public function __construct(Door $door)
    {
        parent::__construct();

        $this->door = $door;
        $this->motorStatus = MotorStatus::STOPPED();    // 초기에는 멈춘 상태
    }

    private function moveHyundaiMotor(Direction $direction)
    {
        dump("===== moveHyundaiMotor 호출됨");
        dump("===== Hyundai Motor 를 구동시킴");
        dump($direction);
    }

    public function getMotorStatus() : MotorStatus
    {
        return $this->motorStatus;
    }

    private function setMotorStatus(MotorStatus $motorStatus) : void
    {
        $this->motorStatus = $motorStatus;
    }

    public function move(Direction $direction) : void
    {
        $motorStatus = self::getMotorStatus();
        if ($motorStatus->is(MotorStatus::MOVING)) {    // 이미 이동 중이면 아무 작업을 하지 않음
            return;
        }

        $doorStatus = $this->door->getDoorStatus();
        if ($doorStatus->is(DoorStatus::OPENED)) {  // 만약 문이 열려 있으면 우선 문을 닫음
            $this->door->close();
        }

        self::moveHyundaiMotor($direction); // 모터를 주어진 방향으로 이동시킴
        $this->setMotorStatus(MotorStatus::MOVING());   // 모터 상태를 이동 중으로 변경함
    }
}
