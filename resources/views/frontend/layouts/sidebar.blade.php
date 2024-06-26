</html>
<!-- main -->
<section id="body">
    <div class="container">
        <div class="row">
            <!--- sidebar --->
            <!--- sidebar --->
            <div id="sidebar" class="col-md-3">
                <form id="searchForm" action="{{ route('search_item_dm') }}" method="get">
                    <nav id="menu">
                        <ul>
                            <li class="menu-item">Địa điểm du lịch</li>
                            <li class="menu-item"><a class="menu-link" data-key="Hội An" href="#">Du lịch Hội
                                    An</a></li>
                            <li class="menu-item"><a class="menu-link" data-key="Đà Nẵng" href="#">Du lịch Đà
                                    Nẵng</a></li>
                            <li class="menu-item"><a class="menu-link" data-key="SaPa" href="#">Du lịch SaPa</a>
                            </li>
                            <li class="menu-item"><a class="menu-link" data-key="Phú Quốc" href="#">Du lịch Phú
                                    Quốc</a></li>
                            <li class="menu-item"><a class="menu-link" data-key="Đà Lạt" href="#">Du lịch Đà
                                    Lạt</a></li>
                            <li class="menu-item"><a class="menu-link" data-key="Côn Đảo" href="#">Du lịch Côn
                                    Đảo</a></li>
                            <li class="menu-item"><a class="menu-link" data-key="Tây Nguyên" href="#">Du lịch Tây
                                    Nguyên</a></li>
                        </ul>
                        <input type="hidden" name="search_key">
                    </nav>
                </form>
            </div>
            <!--- endsidebar --->

            <!--- endsidebar --->
            <div id="main" class="col-md-9">
                <!-- main -->
                <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
                <div id="slider">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img width="848" height="350" src="{{ asset('img/home/slide-1.png') }}"
                                    alt="Los Angeles">
                            </div>
                            <div class="carousel-item">
                                <img width="848" height="350" src="{{ asset('img/home/slide-2.png') }}"
                                    alt="Chicago">
                            </div>
                            <div class="carousel-item">
                                <img width="848" height="350" src="{{ asset('img/home/slide-3.png') }}"
                                    alt="New York">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <!-- end main -->
            </div>
            <!--- content --->
            {{-- @yield( 'content' ) --}}
            <!--- endcontent --->
        </div>
    </div>
</section>
<!-- endmain -->
