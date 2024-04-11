<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VN Tourist | Login</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <div>
                    <img style="width:90%; height:90%;" src="{{ asset('img/home/logo.png') }}" alt="image">
                </div>

            </div>
            <h3>Chào mừng đến với VN Tourist</h3>
            <p>Đăng nhập. Để xem nó hoạt động.</p>
            <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
                @csrf
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                @if (isset($errors))
                    <p style="color: #D7261E">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                    </p>
                @endif
                @if (isset($message))
                    <p style="color: #D7261E">
                        {{ $message }}
                    </p>
                @endif
                <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
            </form>
            <p class="m-t"> <small>Công ty du lịch Việt Nam &copy; 2024</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
