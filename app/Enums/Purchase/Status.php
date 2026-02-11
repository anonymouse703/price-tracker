<?php

namespace App\Enums\Purchase;

use App\Enums\Traits\EnumToArray;

enum Status: string
{
    use EnumToArray;

    case Unpaid = 'unpaid';
    case Paid = 'paid';
    case Partial = 'partial';
}
