<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsAdminController extends Controller
{
    public function index()
    {

        //Retorno JSON CON LARAVEL.

        return response()->json([
            'status' => 0,
            'data' => Product::all()
        ]);
    }

    public function view(int $id)
    {

        return response()->json([
            'status' => 0,
            'data' => Product::findOrFail($id)
        ]);
    }

    public function create(Request $request)
    {
        Product::create($request->all());

        return response()->json([
            'status' => 0
        ]);
    }
}
