<?php

namespace App\Enums;

enum StatusType: string
{
    case NEW = 'New';
    case IN_PROGRESS = 'In Progress';
    case COMPLETED = 'Completed';

    /*public function __toString(): string
    {
        return $this->value; // Convert the enum to its string value
    }*/
}

