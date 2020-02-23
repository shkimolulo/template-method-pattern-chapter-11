<?php

namespace App\Domains\Motor;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Motor\Enums\DoorStatus;

class Door extends Model
{
    private $doorStatus;

    public function __construct()
    {
        parent::__construct();

        $this->doorStatus = DoorStatus::CLOSED();
    }

    public function getDoorStatus() : DoorStatus
    {
        return $this->doorStatus;
    }

    public function close()
    {
        $this->doorStatus = DoorStatus::CLOSED();
    }

    public function open()
    {
        $this->doorStatus = DoorStatus::OPENED();
    }
}
