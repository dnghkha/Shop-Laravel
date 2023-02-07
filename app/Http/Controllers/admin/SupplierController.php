<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\supplier\CreateSupplierRequest;
use App\Http\Requests\admin\supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Supplier::all();
        return view('admin.supplier.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Supplier::all();
        return view('admin.supplier.form', ['list' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-supplier.' . $ext;
            $file->move(public_path('uploads/images/suppliers'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        $supplier = Supplier::create();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->alias = $request->alias;
        $supplier->summary = $request->summary;
        $supplier->description = $request->description;
        $supplier->image = $request->image;
        $supplier->save();
        return redirect()->route('admin.supplier.index')->with(['type' => 'success', 'msg' => 'Thêm nhà cung cấp thành công!']);
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
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.form', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->alias = $request->alias;
        $supplier->summary = $request->summary;
        $supplier->description = $request->description;
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-supplier.' . $ext;
            $file->move(public_path('uploads/images/suppliers'), $file_name);
            $request->merge(['image' => $file_name]);
            $supplier->image = $request->image;
        }
        $supplier->update();
        return redirect()->route('admin.supplier.index')->with(['type' => 'success', 'msg' => 'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $name = $supplier->name;
        $supplier->delete();
        return redirect()->route('admin.supplier.index')->with(['type' => 'danger', 'msg' => 'Đã xóa danh mục ' . $name . '!']);
    }
}
