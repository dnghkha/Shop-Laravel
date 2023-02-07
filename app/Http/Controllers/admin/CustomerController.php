<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\CheckoutRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Customer::where('status', '1')->orderBy('id', 'asc')->paginate(12);
        return view('admin.customer.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckoutRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->lastname = $request->c_lname;
        $customer->firstname = $request->c_fname;
        $customer->address = $request->c_address;
        $customer->phone = $request->c_phone;
        $customer->email = $request->c_email_address;
        $customer->ship_lastname = $request->c2_lname;
        $customer->ship_firstname = $request->c2_fname;
        $customer->ship_address = $request->c2_address;
        $customer->ship_phone = $request->c2_phone;
        $customer->ship_email = $request->c2_email_address;

        $customer->update();
        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
