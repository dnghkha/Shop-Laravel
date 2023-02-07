@extends('admin.layout.empty')
@section('content')

<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <form method="post" action="{{route('login')}}">
                    @csrf
                    <div>
                        <h1>Đăng nhập hệ thống</h1>
                    </div>
                    @if (session('type'))
                    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{!!session('msg')!!}</strong>
                    </div>
                    @endif
                    <div class="text-left">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        @error('username')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-left mt-0">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-check text-left">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remember" id="" value="1">
                            Remember me
                        </label>
                    </div>
                    <div>
                        <button class="btn btn-default submit">Đăng nhập</button>
                    </div>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

@endsection