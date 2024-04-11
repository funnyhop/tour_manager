<!-- main -->
<section id="body">
    <div class="container">
        <div class="row">
            <!--- sidebar --->
            <div id="sidebar" class="col-md-3">
                <nav id="menu">
                    <ul>
                        <li class="menu-item">Địa điểm du lịch</li>
                        <li class="menu-item"><a href="#" title="">Du lịch Hội An</a></li>
                        <li class="menu-item"><a href="#" title="">Du lịch Đà Nẵng</a></li>
                        <li class="menu-item"><a href="#" title="">Du lịch SaPa</a></li>
                        <li class="menu-item"><a href="#" title="">Du lịch Phú Quốc</a></li>
                        <li class="menu-item"><a href="#" title="">Du lịch Đà Lạt</a></li>
                        <li class="menu-item"><a href="#" title="">Du lịch Côn Đảo</a></li>
                        <li class="menu-item"><a href="#" title="">Du lịch Tây Nguyên</a></li>
                    </ul>
                    <!-- <a href="#" id="pull">Danh mục</a> -->
                </nav>
            </div>
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
                                <img width="848" height="350" src="{{ asset('img/home/slide-1.png') }}" alt="Los Angeles" >
                            </div>
                            <div class="carousel-item">
                                <img width="848" height="350" src="{{ asset('img/home/slide-2.png') }}" alt="Chicago">
                            </div>
                            <div class="carousel-item">
                                <img width="848" height="350" src="{{ asset('img/home/slide-3.png') }}" alt="New York" >
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

                <div id="banner-t" class="text-center">
                    {{-- <div class="row">
                        <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
                            <a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
                            <a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
                        </div>
                    </div> --}}
                    <!--- content --->
                    {{-- @yield( 'content' ) --}}
                    <!--- endcontent --->
                </div>
                <!-- end main -->
            </div>
        <!--- content --->
        @yield( 'content' )
        <!--- endcontent --->
        </div>
    </div>
</section>
<!-- endmain -->


