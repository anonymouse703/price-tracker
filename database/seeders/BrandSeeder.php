<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [

            // Cement
            'Holcim Philippines',
            'Republic Cement',
            'Eagle Cement',
            'CEMEX Philippines',
            'Northern Cement',
            'Rizal Masonry Cement',
            'Taiheiyo Cement',
            'Goodfound Cement',

            // Steel / Rebars
            'SteelAsia',
            'Pag-asa Steel',
            'Capitol Steel',
            'Power Steel',
            'Regan Industrial Sales',
            'TKL Steel',
            'Melchers Steel',
            'Philippine Iino Corporation',

            // Roofing / Metal
            'DN Steel',
            'Union Galvasteel',
            'Colorsteel',
            'Metalink',
            'Philippine Steel Framing Corp',
            'Shelter Roofing',
            'Puyat Steel',
            'Apollo Steel',

            // Paint
            'Boysen',
            'Davies Paints',
            'Island Paints',
            'Rain or Shine',
            'Nation Paint',
            'Dutch Boy',
            'Pacific Paint',
            'Kansai Paint',
            'Nippon Paint',
            'Jotun',
            'Welcoat',

            // Tiles / Finishing
            'Mariwasa',
            'FC Tile Depot',
            'Tile Center',
            'Eurotiles',
            'Ten Zen Tiles',
            'Formica',
            'Wilsonart',
            'Hafele',
            'Wilcon Depot',
            'Granite Depot',

            // Plumbing / Pipes
            'Atlanta Industries',
            'Neltex',
            'Crown Pipes',
            'Emerald Pipes',
            'Cotto',
            'Supreme Pipes',
            'Civic Merchandising',
            'Gerber',
            'American Standard',
            'Grohe',
            'Kohler',

            // Electrical
            'Phelps Dodge',
            'Philflex',
            'Panasonic',
            'Omni Electrical',
            'Royu',
            'Firefly Lighting',
            'Schneider Electric',
            'ABB',
            'Siemens',
            'Legrand',
            'Eaton',
            'Meiji Electric',

            // Tools / Hardware
            'Ingco',
            'Bosch',
            'Makita',
            'Stanley',
            'DeWalt',
            'Lotus Tools',
            'Total Tools',
            'Mr. DIY',
            'Black & Decker',
            'Milwaukee',
            'Hitachi',
            'Truper',
            'Tolsen',
            'Workpro',

            // Adhesives / Sealants
            'Davco',
            'ABC Tile Adhesive',
            'Sika',
            'Bostik',
            'Pioneer Pro',
            'Mighty Bond',
            'Ardex',
            'Laticrete',
            'Mapei',
            'Elastoseal',
            'Rugby Cement',

            // Waterproofing / Chemicals
            'Sikaflex',
            'Vulcaseal',
            'Rainshield',
            'Aquaproof',
            'Cemcrete',
            'Hydroseal',
            'Flexibond',

            // Ceiling / Boards
            'HardieFlex',
            'Knauf',
            'Gyproc',
            'USG Boral',
            'Shera',
            'Boral',

            // Glass / Aluminum
            'AFC Aluminum',
            'Aluminum Power Marketing',
            'Philippine Aluminum Wheels',
            'Glass Depot',
            'Asahi Glass',

            // Fasteners / Misc
            'Nelson Stud',
            'Hilti',
            'Ramset',
            'Fischer',
            'Rawlplug',

            // Aggregates / Construction Supply
            'Cornersteel',
            'Mega Global Steel',
            'Liton Industrial',
            'Prime Sales',
            'Buildrite',

        ];

        foreach ($brands as $brandName) {
            Brand::updateOrCreate(
                ['name' => $brandName],
                [
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
