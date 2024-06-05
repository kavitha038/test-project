<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\CoffeeSales;
class SalesController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1',
            'unit_cost' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $sale = CoffeeSales::create([
            'quantity' => $request->quantity,
            'unit_cost' => $request->unit_cost,
        ]);

        $sale->calculateSellingPrice();

        return redirect()->route('coffee.sales');
    }

    public function getSales(){

        $sales = CoffeeSales::whereNull('coffee_product_id')->get();
        return view('coffee_sales', compact('sales'));
    }

    public function getSalesWithProduct()
    {
        $sales = CoffeeSales::whereNotNull('coffee_product_id')->get();

        return view('coffee_product_sales', compact('sales'));
    }

    public function storeWithProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'quantity' => 'required|numeric|min:1',
            'unit_cost' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = $request->input('product');
        $quantity = $request->input('quantity');
        $unit_cost = $request->input('unit_cost');
        

        $sale = CoffeeSales::create([
            'coffee_product_id' => $product,
            'quantity' => $quantity,
            'unit_cost' => $unit_cost,
        ]);

        $sale->calculateSellingPrice();

        return redirect()->route('coffee.product.sales-data');
    }
}
