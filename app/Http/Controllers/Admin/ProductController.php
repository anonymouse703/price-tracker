<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected string $resource = ProductResource::class;

    public function __construct(
        protected ProductRepositoryInterface $productRepository,
    ){}

    public function searchProduct(Request $request)
    {
        $query = trim((string) $request->query('query', ''));

        $products = $this->productRepository
            ->with(['brand','unit'])
            ->filterByKeyword($query)
            ->filterByActive()
            ->limit(10)
            ->get();

        return view('welcome')->with('products', $products);;
    }

}
