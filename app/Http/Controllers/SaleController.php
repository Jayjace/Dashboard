<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return Sale::with('product', 'user')->get();
    }

    public function show($id)
    {
        return Sale::with('product', 'user')->findOrFail($id);
    }
}
