<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('web.cart.shopping_cart', ['list' => session('cart')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Product::where(['id' => $request->id, 'status' => 1])->where('qty', '>', 1)->first();
        $name = $item->name;

        if (!$item) {
            return response()->json(['prop' => true, 'msg' => 'Out of stock']);
        }
        $cart = session('cart');
        if (isset($cart[$item->id])) {
            $cart[$item->id]['buyqty']++;
        } else {
            $cart[$item->id] = [
                'id' => $item->id,
                'sku' => $item->sku,
                'name' => $item->name,
                'image' => $item->image,
                'qty' => $item->qty,
                'buyqty' => 1,
                'price' => $item->price
            ];
        }
        session(['cart' => $cart]);
        $count_cart = 0;
        $total = 0;
        foreach ($cart as $item) {
            $count_cart += $item['buyqty'];
            $total += $item['buyqty'] * $item['price'];
        }
        session(['count_cart' => $count_cart]);
        session(['total' => number_format($total)]);
        return response()->json([
            'prop' => false,
            'action' => '+ Add To Cart',
            'count_cart' => $count_cart,
            'total' => number_format($total),
            'title' => $name,
            'msg' => 'has been added to your cart.'
        ]);
        // return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $item = Product::where(['id' => $id, 'status' => 1])->where('qty', '>', 1)->first();

        $cart = session('cart');
        if ($request->_action == 'increase') {
            $cart[$id]['buyqty']++;
        }
        if ($request->_action == 'decrease') {
            $cart[$id]['buyqty']--;
        }
        if ($cart[$id]['buyqty'] < 1) {
            $cart[$id]['buyqty'] = 1;
        }
        if ($cart[$id]['buyqty'] > $item->qty) {
            $cart[$id]['buyqty'] = $cart[$id]['buyqty'] - 1;
        }

        session(['cart' => $cart]);
        $count_cart = 0;
        $total = 0;
        foreach ($cart as $item) {
            $count_cart += $item['buyqty'];
            $total += $item['buyqty'] * $item['price'];
        }
        session(['count_cart' => $count_cart]);
        session(['total' => number_format($total)]);
        return response()->json([
            'id' => $id,
            'buyqty_item' => $cart[$id]['buyqty'],
            'price_total' => number_format($cart[$id]['buyqty'] * $cart[$id]['price']),
            'count_cart' => $count_cart,
            'total' => number_format($total),
            'tax' => number_format($total * 8 / 100),
            'total2' => number_format($total + ($total * 8 / 100)),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $cart = session('cart');
        if (isset($cart[$id])) {
            $name = $cart[$id]['name'];
            unset($cart[$id]);
        }
        // dd(session('cart'));
        session(['cart' => $cart]);
        $count_cart = 0;
        $total = 0;
        foreach ($cart as $item) {
            $count_cart += $item['buyqty'];
            $total += $item['buyqty'] * $item['price'];
        }
        session(['count_cart' => $count_cart]);
        session(['total' => number_format($total)]);
        return response()->json([
            'id' => 'item_' . $id,
            'count_cart' => $count_cart,
            'total' => number_format($total),
            'tax' => number_format($total * 8 / 100),
            'total2' => number_format($total + ($total * 8 / 100)),
            'title' => $name,
            'msg' => 'was removed successfully!'
        ]);
    }
}
