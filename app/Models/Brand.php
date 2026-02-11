<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    // Fillable fields for mass assignment
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    // Casts
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Products under this brand
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
