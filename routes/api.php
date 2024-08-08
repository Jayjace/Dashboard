<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::post('register', [AuthController::class, 'register']); // Register a new user
Route::post('login', [AuthController::class, 'login']); // Log in a user
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); // Log out a user

// Public Routes (no authentication required)
Route::get('products', [ProductController::class, 'index']); // View all products
Route::get('products/{id}', [ProductController::class, 'show']); // View a single product

// Protected Routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    // CRUD operations for content
    Route::resource('contents', ContentController::class)
        ->only(['index', 'show', 'store', 'update', 'destroy']); 

    // CRUD operations for products
    Route::resource('products', ProductController::class)
        ->only(['store', 'update', 'destroy']); 

    // View sales (read-only)
    Route::resource('sales', SaleController::class)
        ->only(['index', 'show']);

    // Get authenticated user details
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

