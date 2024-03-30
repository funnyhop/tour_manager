<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                         </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        {{-- <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li> --}}
                        {{-- <li class="divider"></li> --}}
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img style="width:50%; height:50%;" src="{{ asset('img/home/logo.png') }}" alt="image">
                </div>
            </li>
            <li>
                <a href="{{ route('income') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Tổng quan</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('income') }}">Doanh thu</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('restaurant') }}"><i class="fa fa-cutlery" aria-hidden="true"></i> <span class="nav-label">Nhà hàng</span></a>
            </li>
            <li>
                <a href="{{ route('hotel') }}"><i class="fa fa-bed"></i> <span class="nav-label">Khách sạn</span></a>
            </li>
            <li>
                <a href="{{ route('vehicle') }}"><i class="fa fa-car"></i> <span class="nav-label">Phương tiện</span></a>
            </li>
            <li>
                <a href="{{ route('location') }}"><i class="fa fa-location-arrow"></i> <span class="nav-label">Địa điểm</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa fa-ravelry" aria-hidden="true"></i> <span class="nav-label">Tour du lịch</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('tour') }}">Danh sách</a></li>
                    {{-- <li><a href="{{ route('schedule') }}">Lịch trình</a></li> --}}
                    <li><a href="{{ route('eat') }}">Điểm ăn</a></li>
                    <li><a href="{{ route('accommodation') }}">Nơi ở</a></li>
                    <li><a href="{{ route('move') }}">Di chuyển</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Đơn hàng</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('order') }}">Đơn hàng</a></li>
                    <li><a href="{{ route('bill') }}">Hóa đơn</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('opject') }}"><i class="fa fa-users"></i> <span class="nav-label">Đối tượng</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-plus"></i> <span class="nav-label">Quản lý người dùng</span><span class="fa arrow"></span></a>
                {{-- <span class="pull-right label label-primary">SPECIAL</span> --}}
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('employee') }}">Nhân viên</a></li>
                    <li><a href="{{ route('customer') }}">Khách hàng</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-building"></i> <span class="nav-label">Cơ cấu công ty</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('unit') }}">Đơn vị</a></li>
                    <li><a href="{{ route('office') }}">Chức vụ</a></li>
                    <li><a href="{{ route('employee_position') }}">Chức vụ nhân viên</a></li>
                </ul>
            </li>
            <li class="landing_link">
                <a target="_blank" href="#"><i class="fa fa-phone"></i> <span class="nav-label">+84 72 099 252</span> <span class="label label-warning pull-right">Hỗ trợ</span></a>
            </li>
            <li class="special_link">
                <a href="/"><i class="fa fa-plane"></i> <span class="nav-label">VietNam Tourist</span></a>
            </li>
        </ul>

    </div>
</nav>
