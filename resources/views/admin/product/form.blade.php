@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sửa sản phẩm, Thêm sản phẩm</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" method="post"
                    action="{{(Request::routeIs('admin.product.edit'))?route('admin.product.update', $product->id):route('admin.product.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (Request::routeIs('admin.product.edit'))
                    @method('PUT')
                    @endif
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="name" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->name:old('name')}}"
                                placeholder="">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Mã sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="sku" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->sku:old('sku')}}"
                                placeholder="">
                            @error('sku')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Giá sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="price" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->price:old('price')}}"
                                placeholder="">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Số lượng</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="qty" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->qty:old('qty') }}"
                                placeholder="">
                            @error('qty')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nhà cung cấp</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="supplier_id" id="">
                                @foreach ($supplier as $item)
                                <option @isset($product->supplier_id)
                                    @if ($product->supplier_id == $item->id)
                                    selected
                                    @endif
                                    @endisset value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Danh mục sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="category_id" id="category">
                                @foreach ($category as $item)
                                <option @isset($product->category_id)
                                    @if ($product->category_id == $item->id)
                                    selected
                                    @endif
                                    @endisset value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Alias</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="alias" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->alias:old('alias') }}"
                                placeholder="">
                            @error('alias')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Summary</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="summary" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->summary:old('summary') }}"
                                placeholder="">
                            @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Content</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="content" class="form-control"
                                value="{{(Request::routeIs('admin.product.edit'))?$product->content:old('content') }}"
                                placeholder="">
                            @error('content')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Image</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" name="file_upload" class="form-control" value="" placeholder="">
                            @error('file_upload')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="{{route('admin.product.index')}}" type="button" class="btn btn-primary">Quay về</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Ghi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection