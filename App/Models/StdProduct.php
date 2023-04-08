<?php

namespace App\Models;

class StdProduct extends Product implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}