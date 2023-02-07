<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Admin tool</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('/')}}uploads/images/users/{{Auth::user()->image}}" alt="login_name"
                    class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Chào,</span>
                <h2>{{Auth::user()->Firstname}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Tông quan</a>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Bán hàng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.order.index')}}">Đơn hàng </a></li>
                            <li><a href="{{route('admin.customer.index')}}">Khách hàng </a></li>
                            <li><a href="#">Báo cáo</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Sản xuất <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Sản phẩm <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.product.index')}}">Danh sách</a></li>
                                    <li><a href="{{route('admin.product.create')}}">Thêm</a></li>
                                </ul>
                            </li>
                            <li><a>Danh mục <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.category.index')}}">Danh sách</a></li>
                                    <li><a href="{{route('admin.category.create')}}">Thêm</a></li>
                                </ul>
                            </li>
                            <li><a>Nhà cung cấp <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.supplier.index')}}">Danh sách</a></li>
                                    <li><a href="{{route('admin.supplier.create')}}">Thêm</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Quản trị <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.user.index')}}">Danh sách</a></li>
                            <li><a href="{{route('admin.user.create')}}">Thêm</a></li>
                            <li><a href="{{route('admin.role.index')}}">Phân quyền</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Hệ thống <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Lịch sử</a></li>
                            <li><a href="chartjs2.html">Cấu hình</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>