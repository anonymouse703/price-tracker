<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(app(Product::class));
    }

    public function filterByActive(): self
    {
        return $this->filter(static fn(Builder $builder) => $builder->where('is_active', 1));
    }

    public function filterByKeyword(?string $keyword = null): self
    {
        if (!empty($keyword)) {
             return $this->filter(static function (Builder $builder) use($keyword) {
                $builder->when($keyword, fn($q) =>
                    $q->where('name', 'like', "%{$keyword}%")
                );
            });
        }

        return $this;
    }
}
