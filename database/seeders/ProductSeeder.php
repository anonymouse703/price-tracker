<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Unit;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = Brand::all();
        $units = Unit::all();

        $products = [
            ['name' => 'Holcim Cement 40kg', 'description' => 'Portland cement for general construction', 'unit' => 'Sack', 'price' => 250],
            ['name' => 'Republic Cement 50kg', 'description' => 'High-strength cement', 'unit' => 'Sack', 'price' => 260],
            ['name' => 'Eagle Cement 40kg', 'description' => 'General purpose cement', 'unit' => 'Sack', 'price' => 245],
            ['name' => 'Steel Rebar 16mm', 'description' => 'Reinforcing steel bar', 'unit' => 'Length', 'price' => 120],
            ['name' => 'Steel Rebar 12mm', 'description' => 'Reinforcing steel bar', 'unit' => 'Length', 'price' => 85],
            ['name' => 'DN Roofing Sheet 0.5mm', 'description' => 'GI roofing sheet', 'unit' => 'Sheet', 'price' => 450],
            ['name' => 'Boysen Premium White Paint 4L', 'description' => 'Interior premium paint', 'unit' => 'Can', 'price' => 350],
            ['name' => 'Davies Wall Paint 4L', 'description' => 'Durable wall paint', 'unit' => 'Can', 'price' => 320],
            ['name' => 'Island Paints Red 4L', 'description' => 'Exterior paint', 'unit' => 'Can', 'price' => 330],
            ['name' => 'Mariwasa Tiles 30x30cm', 'description' => 'Floor tile', 'unit' => 'Box', 'price' => 780],
            ['name' => 'FC Ceramic Tiles 40x40cm', 'description' => 'Flooring tile', 'unit' => 'Box', 'price' => 950],
            ['name' => 'PVC Pipe 3 inch', 'description' => 'Water line PVC pipe', 'unit' => 'Length', 'price' => 75],
            ['name' => 'PVC Pipe 2 inch', 'description' => 'Water line PVC pipe', 'unit' => 'Length', 'price' => 50],
            ['name' => 'Philflex Electrical Wire 1.5mm', 'description' => 'Single core wire', 'unit' => 'Meter', 'price' => 18],
            ['name' => 'Philflex Electrical Wire 2.5mm', 'description' => 'Single core wire', 'unit' => 'Meter', 'price' => 30],
            ['name' => 'Atlanta PVC Elbow 2 inch', 'description' => 'PVC pipe elbow', 'unit' => 'Piece', 'price' => 25],
            ['name' => 'Cotto Bathroom Faucet', 'description' => 'Bathroom faucet', 'unit' => 'Piece', 'price' => 1200],
            ['name' => 'American Standard Toilet Bowl', 'description' => 'Toilet with seat', 'unit' => 'Piece', 'price' => 5200],
            ['name' => 'Makita Cordless Drill', 'description' => 'Battery-powered drill', 'unit' => 'Piece', 'price' => 8500],
            ['name' => 'Bosch Angle Grinder 4 inch', 'description' => 'Power tool', 'unit' => 'Piece', 'price' => 5500],
            ['name' => 'Stanley Tape Measure 5m', 'description' => 'Measuring tape', 'unit' => 'Piece', 'price' => 150],
            ['name' => 'DeWalt Hammer Drill', 'description' => 'Electric hammer drill', 'unit' => 'Piece', 'price' => 9200],
            ['name' => 'Lotus Tools Wrench Set 12pcs', 'description' => 'Hand tool set', 'unit' => 'Set', 'price' => 1200],
            ['name' => 'Sika Concrete Sealant 300ml', 'description' => 'Construction sealant', 'unit' => 'Tube', 'price' => 180],
            ['name' => 'Bostik Adhesive 1kg', 'description' => 'Tile adhesive', 'unit' => 'Bag', 'price' => 220],
            ['name' => 'Davco Tile Adhesive 20kg', 'description' => 'Cement-based adhesive', 'unit' => 'Bag', 'price' => 420],
            ['name' => 'Cement Mixer 1/2 Bag', 'description' => 'Portable cement mixer', 'unit' => 'Piece', 'price' => 15000],
            ['name' => 'Wheelbarrow Heavy Duty', 'description' => 'Construction wheelbarrow', 'unit' => 'Piece', 'price' => 2800],
            ['name' => 'Drum of Paint Thinner 20L', 'description' => 'Paint thinner for cleaning', 'unit' => 'Drum', 'price' => 2800],
            ['name' => 'Galvanized Nails 16D', 'description' => '16-penny nails', 'unit' => 'Kilogram', 'price' => 180],
            ['name' => 'Galvanized Nails 10D', 'description' => '10-penny nails', 'unit' => 'Kilogram', 'price' => 150],
            ['name' => 'Wooden Plank 2x4x12ft', 'description' => 'Construction lumber', 'unit' => 'Piece', 'price' => 220],
            ['name' => 'Wooden Plank 1x4x12ft', 'description' => 'Construction lumber', 'unit' => 'Piece', 'price' => 140],
            ['name' => 'Roofing Screw 5 inch', 'description' => 'Metal roofing screws', 'unit' => 'Kilogram', 'price' => 350],
            ['name' => 'Roofing Screw 3 inch', 'description' => 'Metal roofing screws', 'unit' => 'Kilogram', 'price' => 250],
            ['name' => 'PVC Floor Drain 100mm', 'description' => 'Floor drain', 'unit' => 'Piece', 'price' => 120],
            ['name' => 'Fire Retardant Paint 4L', 'description' => 'Safety paint', 'unit' => 'Can', 'price' => 420],
            ['name' => 'Metallic Primer 1L', 'description' => 'Primer paint for metal surfaces', 'unit' => 'Can', 'price' => 250],
            ['name' => 'Electrical Conduit 1/2 inch', 'description' => 'PVC electrical conduit', 'unit' => 'Meter', 'price' => 25],
            ['name' => 'Electrical Conduit 3/4 inch', 'description' => 'PVC electrical conduit', 'unit' => 'Meter', 'price' => 35],
            ['name' => 'Paint Roller 9 inch', 'description' => 'Paint roller for walls', 'unit' => 'Piece', 'price' => 120],
            ['name' => 'Paint Brush 3 inch', 'description' => 'Wall painting brush', 'unit' => 'Piece', 'price' => 80],
            ['name' => 'PVC Water Tank 1000L', 'description' => 'Water storage tank', 'unit' => 'Piece', 'price' => 11500],
            ['name' => 'PVC Water Tank 500L', 'description' => 'Water storage tank', 'unit' => 'Piece', 'price' => 6500],
            ['name' => 'Aluminum Ladder 12ft', 'description' => 'Lightweight ladder', 'unit' => 'Piece', 'price' => 4200],
            ['name' => 'Aluminum Ladder 6ft', 'description' => 'Lightweight ladder', 'unit' => 'Piece', 'price' => 2300],
            ['name' => 'Electric Panel 20A', 'description' => 'Circuit breaker panel', 'unit' => 'Piece', 'price' => 2200],
            ['name' => 'Electric Panel 40A', 'description' => 'Circuit breaker panel', 'unit' => 'Piece', 'price' => 3200],
            ['name' => 'PVC Elbow 1 inch', 'description' => 'PVC pipe fitting', 'unit' => 'Piece', 'price' => 20],
            ['name' => 'PVC Elbow 2 inch', 'description' => 'PVC pipe fitting', 'unit' => 'Piece', 'price' => 30],
            ['name' => 'PVC Tee 1 inch', 'description' => 'PVC pipe fitting', 'unit' => 'Piece', 'price' => 25],
            ['name' => 'PVC Tee 2 inch', 'description' => 'PVC pipe fitting', 'unit' => 'Piece', 'price' => 40],
            ['name' => 'Wall Tile 60x60cm', 'description' => 'Ceramic wall tile', 'unit' => 'Box', 'price' => 1250],
        ];

        foreach ($products as $item) {
            
            $brand = $brands->isNotEmpty() ? $brands->random() : null;
            $unit = $units->where('name', $item['unit'])->first();

            Product::updateOrCreate(
                ['name' => $item['name']], 
                [
                    'brand_id' => $brand?->id,
                    'description' => $item['description'],
                    'unit_id' => $unit?->id,
                    'barcode' => 'BC' . rand(1000000000, 9999999999),
                    'current_price' => $item['price'],
                    'is_active' => true,
                ]
            );
        }
    }
}