<?php

namespace App\Http\Controllers;

use App\Mail\ProductReserved;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductsReservationController extends Controller
{
    public function processReservation(Request $request, int $id)
    {
        Mail::to($request->user()->email)->send(new ProductReserved(Product::findOrFail($id)));

        return redirect()
            ->route('products.index')
            ->with('feedback.message', 'El producto se reservó con éxito.');
    }
}
