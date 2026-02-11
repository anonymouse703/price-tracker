<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [

            // Piece-based
            ['name' => 'Piece', 'symbol' => 'pc'],
            ['name' => 'Pieces', 'symbol' => 'pcs'],
            ['name' => 'Unit', 'symbol' => 'unit'],
            ['name' => 'Set', 'symbol' => 'set'],
            ['name' => 'Pair', 'symbol' => 'pair'],
            ['name' => 'Roll', 'symbol' => 'roll'],
            ['name' => 'Sheet', 'symbol' => 'sheet'],
            ['name' => 'Stick', 'symbol' => 'stick'],
            ['name' => 'Bundle', 'symbol' => 'bundle'],
            ['name' => 'Box', 'symbol' => 'box'],
            ['name' => 'Carton', 'symbol' => 'ctn'],
            ['name' => 'Pack', 'symbol' => 'pack'],
            ['name' => 'Dozen', 'symbol' => 'doz'],
            ['name' => 'Gross', 'symbol' => 'grs'],

            // Construction specific
            ['name' => 'Bag', 'symbol' => 'bag'],
            ['name' => 'Sack', 'symbol' => 'sack'],
            ['name' => 'Load', 'symbol' => 'load'],
            ['name' => 'Pail', 'symbol' => 'pail'],
            ['name' => 'Can', 'symbol' => 'can'],
            ['name' => 'Drum', 'symbol' => 'drum'],
            ['name' => 'Tube', 'symbol' => 'tube'],
            ['name' => 'Cylinder', 'symbol' => 'cyl'],
            ['name' => 'Tank', 'symbol' => 'tank'],
            ['name' => 'Container', 'symbol' => 'container'],

            // Weight
            ['name' => 'Kilogram', 'symbol' => 'kg'],
            ['name' => 'Gram', 'symbol' => 'g'],
            ['name' => 'Ton', 'symbol' => 'ton'],
            ['name' => 'Metric Ton', 'symbol' => 'mt'],
            ['name' => 'Pound', 'symbol' => 'lb'],
            ['name' => 'Ounce', 'symbol' => 'oz'],

            // Volume
            ['name' => 'Liter', 'symbol' => 'L'],
            ['name' => 'Milliliter', 'symbol' => 'mL'],
            ['name' => 'Gallon', 'symbol' => 'gal'],
            ['name' => 'Quart', 'symbol' => 'qt'],
            ['name' => 'Cubic Meter', 'symbol' => 'm³'],
            ['name' => 'Cubic Foot', 'symbol' => 'ft³'],

            // Length
            ['name' => 'Meter', 'symbol' => 'm'],
            ['name' => 'Centimeter', 'symbol' => 'cm'],
            ['name' => 'Millimeter', 'symbol' => 'mm'],
            ['name' => 'Foot', 'symbol' => 'ft'],
            ['name' => 'Inch', 'symbol' => 'in'],
            ['name' => 'Yard', 'symbol' => 'yd'],

            // Area
            ['name' => 'Square Meter', 'symbol' => 'sqm'],
            ['name' => 'Square Foot', 'symbol' => 'sqft'],

            // Lumber
            ['name' => 'Board Foot', 'symbol' => 'bdft'],
            ['name' => 'Length', 'symbol' => 'length'],

            // Aggregates
            ['name' => 'Cubic', 'symbol' => 'cu'],
            ['name' => 'Truckload', 'symbol' => 'truck'],
            ['name' => 'Wheelbarrow', 'symbol' => 'wb'],

        ];

        foreach ($units as $unit) {
            DB::table('units')->updateOrInsert(
                ['name' => $unit['name']],
                [
                    'symbol' => $unit['symbol'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
