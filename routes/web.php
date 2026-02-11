<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    $products = Product::with(['unit','brand'])
        ->orderBy('created_at', 'desc') 
        ->take(10)
        ->get();

    return view('welcome')
        ->with('products', $products);
})->name('home');

Route::get('properties/search-product', [ProductController::class, 'searchProduct'])
        ->name('properties.search-product');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
