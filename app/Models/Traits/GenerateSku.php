<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait GenerateSku
{
    protected static function bootGenerateSku(): void
    {
        static::creating(function ($model) {
            if (empty($model->sku)) {
                $model->sku = $model->generateUniqueSku();
            }
        });
    }

    /**
     * Generate a sequential unique SKU
     */
    public function generateUniqueSku(  // Changed from protected to public
        string $prefix = 'PRD',
        int $length = 6,
        string $column = 'sku'
    ): string {
        // Find the last SKU number
        $lastSku = static::where($column, 'like', "$prefix-%")
            ->orderBy('id', 'desc')
            ->first();

        $number = 1;

        if ($lastSku) {
            $parts = explode('-', $lastSku->$column);
            $numPart = intval(end($parts));
            $number = $numPart + 1;
        }

        // Pad with zeros
        $sku = $prefix . '-' . str_pad($number, $length, '0', STR_PAD_LEFT);

        return $sku;
    }
}