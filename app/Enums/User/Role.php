<?php

namespace App\Enums\User;

use App\Enums\Traits\EnumToArray;

enum Role: string
{
    use EnumToArray;

    case Admin = 'admin';
    case Manager = 'manager';
    case Cashier = 'cashier';
}
