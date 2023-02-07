@extends('admin.layout.master')
@section('content')

<div class="row">
    @if (session('msg'))
    <div class="col-md-12">
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
            <strong>{!!session('msg')!!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách quản trị ({{count($list)}} dòng)</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)

                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->username}}</td>
                            <td>{{$item->Firstname}}</td>
                            <td>
                                @if ($item->status == 1)
                                {!!'<span class="badge badge-success">Hoạt động</span>'!!}
                                @else
                                {!!'<span class="badge badge-dark">Khóa</span>'!!}
                                @endif
                            </td>
                            <td>
                                <form action="">
                                    <a name="" id="" class="btn btn-primary btn-sm"
                                        href="{{route('admin.role.edit', $item->id)}}" role="button">Cấp quyền</a>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection