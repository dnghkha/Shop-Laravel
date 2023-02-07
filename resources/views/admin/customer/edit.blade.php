@extends('admin.layout.master')
@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật thông tin khách hàng</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" method="post"
                    action="{{route('admin.customer.update', ['customer' => $customer->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Họ KH:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c_lname" class="form-control" value="{{$customer->lastname}}"
                                placeholder="">
                            @error('c_lname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên KH:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c_fname" class="form-control" value="{{$customer->firstname}}"
                                placeholder="">
                            @error('c_fname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Địa chỉ KH:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c_address" class="form-control" value="{{$customer->address}}"
                                placeholder="">
                            @error('c_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Số điện thoại KH:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c_phone" class="form-control" value="{{$customer->phone}}"
                                placeholder="">
                            @error('c_phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Email KH:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c_email_address" class="form-control" value="{{$customer->email}}"
                                placeholder="">
                            @error('c_email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Họ người nhận hàng:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c2_lname" class="form-control" value="{{$customer->lastname}}"
                                placeholder="">
                            @error('c2_lname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên người nhận hàng:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c2_fname" class="form-control" value="{{$customer->firstname}}"
                                placeholder="">
                            @error('c2_fname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Địa chỉ người nhận hàng:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c2_address" class="form-control" value="{{$customer->address}}"
                                placeholder="">
                            @error('c2_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Số điện thoại người nhận hàng:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c2_phone" class="form-control" value="{{$customer->phone}}"
                                placeholder="">
                            @error('c2_phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Email người nhận hàng:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="c2_email_address" class="form-control" value="{{$customer->email}}"
                                placeholder="">
                            @error('c2_email_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="{{route('admin.customer.index')}}" class="btn btn-primary">Quay về</a>
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