<?php

namespace App\Domains\Motor;

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
}
