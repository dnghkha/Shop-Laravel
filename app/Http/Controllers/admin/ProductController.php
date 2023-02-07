<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\product\CreateProductRequest;
use App\Http\Requests\admin\product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Product::where('status', '1')->orderBy('id', 'asc')->paginate(12);
        return view('admin.product.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $category = Category::all();
        return view('admin.product.form', ['supplier' => $supplier, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-product.' . $ext;
            $file->move(public_path('uploads/images/products'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        $product = Product::create();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->alias = $request->alias;
        $product->summary = $request->summary;
        $product->content = $request->content;
        $product->image = $request->image;
        $product->save();
        return redirect()->route('admin.product.index')->with(['type' => 'success', 'msg' => 'Thêm sản phẩm thành công!']);
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
        $product = Product::where('id', $id)->first();
        $supplier = Supplier::all();
        $category = Category::all();
        return view('admin.product.form', ['product' => $product, 'supplier' => $supplier, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->alias = $request->alias;
        $product->summary = $request->summary;
        $product->content = $request->content;
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-product.' . $ext;
            $file->move(public_path('uploads/images/products'), $file_name);
            $request->merge(['image' => $file_name]);
            $product->image = $request->image;
        }
        $product->update();
        return redirect()->route('admin.product.index')->with(['type' => 'success', 'msg' => 'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $name = $product->name;
        $product->delete();
        return redirect()->route('admin.product.index')->with(['type' => 'danger', 'msg' => 'Đã xóa sản phẩm ' . $name . '!']);
    }
}
