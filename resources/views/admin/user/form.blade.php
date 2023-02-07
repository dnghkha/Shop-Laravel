@extends('admin.layout.master')
@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{Request::routeIs('admin.user.create')?'Thêm người dùng':'Sửa người dùng'}}</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" method="POST"
                    action="{{Request::routeIs('admin.user.edit')?route('admin.user.update', $user->id):route('admin.user.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (Request::routeIs('admin.user.edit'))
                    @method('PUT')
                    @endif
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Họ:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="lastname"
                                value="{{Request::routeIs('admin.user.edit')?$user->Lastname:old('lastname')}}"
                                class="form-control" placeholder="">
                            @error('lastname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="firstname"
                                value="{{Request::routeIs('admin.user.edit')?$user->Firstname:old('firstname')}}"
                                class="form-control" placeholder="">
                            @error('firstname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Giới tính:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="form-check">
                                <label class="form-check-label mr-5">
                                    <input @isset($user) @if ($user->Gender == 1)
                                    checked
                                    @endif
                                    @endisset type="radio" class="form-check-input" name="gender" id="" value="1">
                                    Nam
                                </label>
                                <label class="form-check-label">
                                    <input @isset($user) @if ($user->Gender == 0)
                                    checked
                                    @endif
                                    @endisset type="radio" class="form-check-input" name="gender" id="" value="0">
                                    Nữ
                                </label>
                            </div>
                            @error('gender')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3">Ngày sinh: <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="birthday" name="dob"
                                value="{{Request::routeIs('admin.user.edit')?$user->DoB:old('dob')}}"
                                class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                                onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>
                            @error('dob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Ảnh đại diện</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" name="file_upload" class="form-control" value="" placeholder="">
                            @error('file_upload')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Địa chỉ:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="address"
                                value="{{Request::routeIs('admin.user.edit')?$user->Address:old('address')}}"
                                class="form-control" placeholder="">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Số điện thoại:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="phone"
                                value="{{Request::routeIs('admin.user.edit')?$user->phone:old('phone')}}"
                                class="form-control" placeholder="">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">email:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="email" name="email"
                                value="{{Request::routeIs('admin.user.edit')?$user->email:old('email')}}"
                                class="form-control" placeholder="">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tên đăng nhập:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input @isset($user) readonly @endisset type="text" name="username"
                                value="{{Request::routeIs('admin.user.edit')?$user->username:old('username')}}"
                                class="form-control" placeholder="">
                            @error('username')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Mật khẩu:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input @isset($user) readonly @endisset type="password" name="password"
                                value="{{old('password')}}" class="form-control" placeholder="">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Mật khẩu:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input @isset($user) readonly @endisset type="password" name="password_confirmation"
                                value="{{old('password')}}" class="form-control" placeholder="">
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Chức vụ:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="position"
                                value="{{Request::routeIs('admin.user.edit')?$user->Position:old('position')}}"
                                class="form-control" placeholder="">
                            @error('position')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Phòng ban:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="division"
                                value="{{Request::routeIs('admin.user.edit')?$user->Division:old('division')}}"
                                class="form-control" placeholder="">
                            @error('division')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="{{route('admin.user.index')}}" class="btn btn-primary">Quay về</a>
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