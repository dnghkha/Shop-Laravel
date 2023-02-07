@extends('admin.layout.master')
@section('content')

<div class="card x_panel">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
                <div class="col-xl-9">
                    <!-- <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p> -->
                </div>
                <div class="row">
                    <div class="col-xl-12 float-right">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                class="fas fa-print text-primary"></i> Print</a>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                </div>
            </div>
            <hr>

            <div class="container">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="text-primary"><strong>Chi tiết đơn hàng</strong></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 ml-5 mt-5 mb-5">
                        <ul class="list-unstyled">
                            <li class="text-muted">
                                <h5><strong>Tên khách hàng: </strong><span
                                        class="text-capitalize">{{$order->Customer->firstname.'
                                        '.$order->Customer->lastname}}</span></h5>
                            </li>
                            <li class="text-muted">
                                <h5><strong>Địa chỉ: </strong>{{$order->Customer->address}}</h5>
                            </li>
                            <li class="text-muted">
                                <h5><strong>Email: </strong>{{$order->Customer->email}}</h5>
                            </li>
                            <li class="text-muted">
                                <h5><strong>Điện thoại: </strong>{{$order->Customer->phone}}</h5>
                            </li>
                            <li class="text-muted">
                                <h5><strong>Ngày đặt hàng: </strong>{{$order->order_date}}</h5>
                            </li>
                            <li class="text-muted">
                                <form class="form-inline" method="POST"
                                    action="{{route('admin.order.update', $order->id)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="">
                                            <h5><strong>Trạng thái: </strong></h5>
                                        </label>
                                        <select class="form-control" name="order_status" id="order_status">
                                            <option {{($order->order_status == 1)?'selected':''}} value="1"> Mới đặt
                                                hàng</option>
                                            <option {{($order->order_status == 2)?'selected':''}} value="2"> Đã xác nhận
                                            </option>
                                            <option {{($order->order_status == 3)?'selected':''}} value="3"> Đang đóng
                                                gói</option>
                                            <option {{($order->order_status == 4)?'selected':''}} value="4"> Chuyển cho
                                                shipper</option>
                                            <option {{($order->order_status == 5)?'selected':''}} value="5"> Đang giao
                                                hàng</option>
                                            <option {{($order->order_status == 6)?'selected':''}} value="6"> Đã giao
                                                hàng</option>
                                            <option {{($order->order_status == 7)?'selected':''}} value="7"> Giao hàng
                                                thất bại</option>
                                            <option {{($order->order_status == 8)?'selected':''}} value="8"> Hủy đơn
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary ml-2">Cập nhật</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                        <thead style="background-color:#84B0CA ;" class="text-white">
                            <tr>
                                <th scope="col">
                                    <h5>#</h5>
                                </th>
                                <th scope="col">
                                    <h5>Sản phẩm</h5>
                                </th>
                                <th scope="col">
                                    <h5>Số lượng</h5>
                                </th>
                                <th scope="col">
                                    <h5>Đơn giá</h5>
                                </th>
                                <th scope="col">
                                    <h5>Thành tiền</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($product as $key => $item)
                            @php
                            $total += $item->qty*$item->price;
                            @endphp
                            <tr>
                                <th>
                                    <h5>{{$key+1}}</h5>
                                </th>
                                <td>
                                    <h5>{{$item->Product->name}}</h5>
                                </td>
                                <td>
                                    <h5>{{$item->qty}}</h5>
                                </td>
                                <td>
                                    <h5>{{number_format($item->price)}}</h5>
                                </td>
                                <td>
                                    <h5>{{number_format($item->qty*$item->price)}}</h5>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-8">
                        <!-- <h5>Add additional notes and payment information</h5> -->
                    </div>
                    <div class="col-xl-4">
                        <ul class="list-unstyled">
                            <li class="text-dark">
                                <h5><strong>Thành tiền:</strong><span class="float-right mr-5">{{number_format($total)}}
                                        VNĐ</span></h5>
                            </li>
                            <li class="text-dark mt-2">
                                <h5><strong>Thuế(8%):</strong><span
                                        class="float-right mr-5">{{number_format(ceil($total*8/100))}} VNĐ</span></h5>
                            </li>
                            <li class="text-dark mt-2">
                                <h5><strong>Tổng cộng:</strong><span
                                        class="float-right mr-5">{{number_format($total+ceil($total*8/100))}} VNĐ</span>
                                </h5>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection