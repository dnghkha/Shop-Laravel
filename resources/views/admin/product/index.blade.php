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

                <h2>Danh sách sản phẩm (
                    {{ count($list) .' trong tổng số '. $list->total() }} dòng)
                </h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)

                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->category->name??''}}</td>
                            <td>{{$item->supplier->name??''}}</td>
                            <td>
                                <form class="form-inline" method="POST"
                                    action="{{route('admin.product.destroy', $item->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <a name="" id="" class="btn btn-primary btn-sm"
                                        href="{{route('admin.product.edit', $item->id)}}" role="button">Sửa</a>
                                    <button onclick="return confirm('Bạn có muốn xóa dòng này không?')" type="submit"
                                        class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection