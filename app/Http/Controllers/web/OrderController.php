<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\CheckoutRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        if (!session('cart')) {
            return redirect()->route('cart.index')->with(['type' => 'danger', 'msg' => 'CART IS EMPTY']);
        }
        return view('web.cart.checkout', ['list' => session('cart')]);
    }

    public function store(CheckoutRequest $request)
    {
        $customer = Customer::create();
        $customer->firstname = $request->c_fname;
        $customer->lastname = $request->c_lname;
        $customer->address = $request->c_address;
        $customer->phone = $request->c_phone;
        $customer->email = $request->c_email_address;
        $customer->ship_firstname = $request->c2_fname;
        $customer->ship_lastname = $request->c2_lname;
        $customer->ship_address = $request->c2_address;
        $customer->ship_phone = $request->c2_phone;
        $customer->ship_email = $request->c2_email_address;
        $customer->save();

        $order = Order::create();
        $order->code = time();
        $order->order_date = now();
        $order->customer_id = $customer->id;
        $order->notes = $request->c_order_notes;
        $order->payment_method = 'COD';
        $order->save();

        $items = session('cart');
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['buyqty'];
            OrderItem::insert([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'qty' => $item['buyqty'],
                'price' => $item['price']
            ]);
        }
        //up date total
        $order->total_amount = $total;
        $order->save();
        session()->forget('cart');
        return redirect()->route('thankyou')->with(['ordered' => $order]);
    }

    public function thankyou()
    {
        if (!session('ordered'))
            return redirect()->route('home');
        $ordered = session('ordered');
        $email = $ordered->customer->email;
        $name = $ordered->customer->firstname;
        $code = $ordered->code;
        Mail::send('web.cart.contentmail', ['ordered' => $ordered], function ($message) use ($email, $name, $code) {
            $message->to($email, $name);
            $message->subject('Xác nhận đơn hàng số ' . $code);
        });
        $data = [
            'title' => 'Thankyou!',
            'ordered' => $ordered,
            'list' => $ordered->items
        ];
        return view('web.cart.thankyou', $data);
    }
}
