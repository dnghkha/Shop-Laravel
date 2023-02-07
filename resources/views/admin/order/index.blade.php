@extends('admin.layout.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách đơn hàng ({{count($list) .' trong tổng số '. $list->total()}})</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <th>Phương thức thanh toán</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)

                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->code}}</td>
                            <td>{{$item->order_date}}</td>
                            <td>{{$item->Customer->lastname}}</td>
                            <td>{{$item->Customer->firstname}}</td>
                            <td>{{number_format($item->total_amount)}}</td>
                            <td>
                                @switch($item->status)
                                @case(1)
                                Mới đặt hàng
                                @break
                                @case(2)
                                Đã xác nhận
                                @break
                                @case(3)
                                Đang đóng gói
                                @break
                                @case(4)
                                Chuyển cho shipper
                                @break
                                @case(5)
                                Đang giao
                                @break
                                @case(6)
                                Đã giao
                                @break
                                @case(7)
                                Đã giao
                                @break
                                @case(8)
                                Hủy đơn
                                @break
                                @endswitch
                            </td>
                            <td>{{$item->notes}}</td>
                            <td>{{$item->payment_method}}</td>
                            <td><a name="" id="" class="btn btn-primary btn-sm"
                                    href="{{route('admin.order.show', ['order'=> $item->id])}}">Chi tiết</a></td>
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