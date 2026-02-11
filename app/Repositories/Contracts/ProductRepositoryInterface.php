<?php

namespace App\Repositories\Contracts;

use App\Models\Product;

/**
 * @method Product|null find(mixed $id)
 * @method Product|null first()
 */
interface ProductRepositoryInterface extends RepositoryInterface
{
	//define set of methods that ProductRepositoryInterface Repository must implement
	public function filterByActive(): self;
    public function filterByKeyword(?string $keyword = null): self;
}
