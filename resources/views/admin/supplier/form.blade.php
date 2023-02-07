@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    {{Request::routeIs('admin.supplier.edit')?'Sửa nhà cung cấp':'Thêm nhà cung cấp'}}
                </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" method="post"
                    action="{{Request::routeIs('admin.supplier.edit')?route('admin.supplier.update', $supplier->id):route('admin.supplier.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (Request::routeIs('admin.supplier.edit'))
                    @method('PUT')
                    @endif
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên nhà cung cấp:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="name" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->name:old('name')}}"
                                placeholder="">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Địa chỉ nhà cung cấp:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="address" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->address:old('address')}}"
                                placeholder="">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Số điện thoại cung cấp:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="phone" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->phone:old('phone')}}"
                                placeholder="">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Email nhà cung cấp:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="email" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->email:old('email')}}"
                                placeholder="">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Alias:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="alias" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->alias:old('alias')}}"
                                placeholder="">
                            @error('alias')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Summary:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="summary" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->summary:old('summary')}}"
                                placeholder="">
                            @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Description:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="description" class="form-control"
                                value="{{(Request::routeIs('admin.supplier.edit'))?$supplier->description:old('description')}}"
                                placeholder="">
                            @error('description')
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
                            <a href="?controller=product&action=index" type="button" class="btn btn-primary">Quay về</a>
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