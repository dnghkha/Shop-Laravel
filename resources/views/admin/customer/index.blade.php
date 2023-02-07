@extends('admin.layout.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách khách hàng ({{count($list) .' trong tổng số '. $list->total()}})</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item) { ?>
                        <tr>
                            <th>
                                <?= $item->id ?>
                            </th>
                            <td>
                                <?= $item->lastname ?>
                            </td>
                            <td>
                                <?= $item->firstname ?>
                            </td>
                            <td>
                                <?= $item->address ?>
                            </td>
                            <td>
                                <?= $item->email ?>
                            </td>
                            <td>
                                <?= $item->phone ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-primary btn-sm"
                                    href="{{route('admin.customer.edit', ['customer'=>$item->id])}}" role="button">Cập
                                    nhật</a>
                            </td>
                        </tr>
                        <?php } ?>
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