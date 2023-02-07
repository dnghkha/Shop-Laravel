@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    {{Request::routeIs('admin.category.edit')?'Sửa danh mục':'Thêm danh mục'}}
                </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" method="post"
                    action="{{Request::routeIs('admin.category.edit')?route('admin.category.update', $category->id):route('admin.category.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (Request::routeIs('admin.category.edit'))
                    @method('PUT')
                    @endif
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên danh mục:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="name" class="form-control"
                                value="{{(Request::routeIs('admin.category.edit'))?$category->name:old('name')}}"
                                placeholder="">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Danh mục cha:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="parent_id">
                                @if (Request::routeIs('admin.category.create'))
                                @foreach ($list as $item)
                                @if ($item->parent_id == 0)
                                <option @isset($category) @if ($item->id == $category->parent_id)
                                    selected
                                    @endif
                                    @endisset value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                @endforeach
                                <option value="0">Không</option>
                                @endif

                                @if (Request::routeIs('admin.category.edit'))
                                @foreach ($list as $item)
                                <option @isset($category) @if ($item->id == $category->parent_id)
                                    selected
                                    @endif
                                    @endisset value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                <option value="0">Không</option>
                                @endif
                            </select>
                            @error('parent_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Alias:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="alias" class="form-control"
                                value="{{(Request::routeIs('admin.category.edit'))?$category->alias:old('alias')}}"
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
                                value="{{(Request::routeIs('admin.category.edit'))?$category->summary:old('summary')}}"
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
                                value="{{(Request::routeIs('admin.category.edit'))?$category->description:old('description')}}"
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