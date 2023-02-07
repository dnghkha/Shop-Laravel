<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\category\CreateCategoryRequest;
use App\Http\Requests\admin\category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::all();
        return view('admin.category.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Category::all();
        return view('admin.category.form', ['list' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-category.' . $ext;
            $file->move(public_path('uploads/images/categories'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        $category = Category::create();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->alias = $request->alias;
        $category->summary = $request->summary;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->save();
        return redirect()->route('admin.category.index')->with(['type' => 'success', 'msg' => 'Thêm danh mục thành công!']);
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
        $category = Category::find($id);
        $list = Category::all();
        return view('admin.category.form', ['category' => $category, 'list' => $list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->alias = $request->alias;
        $category->summary = $request->summary;
        $category->description = $request->description;
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-product.' . $ext;
            $file->move(public_path('uploads/images/categories'), $file_name);
            $request->merge(['image' => $file_name]);
            $category->image = $request->image;
        }
        $category->update();
        return redirect()->route('admin.category.index')->with(['type' => 'success', 'msg' => 'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $name = $category->name;
        $category->delete();
        return redirect()->route('admin.category.index')->with(['type' => 'danger', 'msg' => 'Đã xóa danh mục ' . $name . '!']);
    }
}
