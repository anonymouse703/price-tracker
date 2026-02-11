<?php

namespace App\Enums\Product;

use App\Enums\Traits\EnumToArray;

enum Unit: string
{
    use EnumToArray;

    case Piece = 'pc';
    case Kilogram = 'kilogram';
    case Liter = 'liter';
    case Bag = 'bag';
    case Box = 'box';
    case Roll = 'roll';
    case Sheet = 'sheet';
    case Pack = 'pack';
    case Tube = 'tube';
    case Set = 'set';
}
