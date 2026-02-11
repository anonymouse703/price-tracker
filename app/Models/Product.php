<?php

namespace App\Models;

use App\Models\Traits\GenerateSku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use GenerateSku;
    use SoftDeletes;

    protected $fillable = [
        'brand_id',
        'name',
        'description',
        'unit_id',
        'barcode',
        'current_price',
        'is_active',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function priceHistories()
    {
        return $this->hasMany(PriceHistory::class)
            ->latest('changed_at');
    }

    /*
    |--------------------------------------------------------------------------
    | Price Update Logic
    |--------------------------------------------------------------------------
    */

    public function updatePrice(float $newPrice): void
    {
        if ($this->current_price == $newPrice) {
            return;
        }

        DB::transaction(function () use ($newPrice) {

            $this->priceHistories()->create([
                'old_price' => $this->current_price,
                'new_price' => $newPrice,
                'updated_by' => Auth::id(),
                'changed_at' => now(),
            ]);

            $this->update([
                'current_price' => $newPrice,
            ]);
        });
    }
}
