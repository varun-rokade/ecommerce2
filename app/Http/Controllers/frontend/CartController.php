<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
        $product = Product::findorfail($id);

        if($product->discount_price == NULL)
        {
            Cart::add([
                'id' => $id,
             'name' => '$request->product_name',
              'qty' => $request->qunatity,
               'price' => $request->selling_price,
                'weight' => 1,
                 'options' => [
                    //  'size' => 'large',
                     'color' => '$request->color',
                     'size' => '$request->size',

                ]
                ]);

                return response()->json(['success' => 'Successfully Added On Your Cart']);


        }
        else
        {
            Cart::add([
                'id' => $id,
             'name' => '$request->product_name',
              'qty' => $request->qunatity,
               'price' => $request->selling_price,
                'weight' => 1,
                 'options' => [
                    //  'size' => 'large',
                     'color' => '$request->color',
                     'size' => '$request->size',

                ]
                ]);
                return response()->json(['success' => 'Successfully Added On Your Cart']);

        }




    }
}
