<!DOCTYPE html>
<html lang="en">

<head>
    <title>Elite Able - Signup</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, log-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Elite Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templates, sass admin templates, html admin templates, responsive, bootstrap admin templates free download, premium bootstrap admin templates, Elite Able, Elite Able bootstrap admin template">
    <meta name="author" content="Codedthemes" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('asset/login/images/favicon.png')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('asset/login/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('asset/login/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('asset/login/css/style.css')}}">
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content container">
            <div class="card">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <img src="{{asset('asset/login/images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
                            <h4 class="mb-3 f-w-400">Đăng ký tài khoản của bạn</h4>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <!-- Thông báo lỗi toàn cục -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Thông báo lỗi cho từng trường -->
                                {{-- <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Tên đăng nhập" value="{{ old('username') }}">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    </div>
                                    <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Tên người dùng" value="{{ old('fullname') }}">
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email " value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                    </div>
                                    <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Nhập lại mật khẩu">
                                </div>
                                
                                <div class="saprator"><span>Hoặc</span></div>
                                <button class="btn btn-facebook mb-2 mr-2"><i class="fab fa-facebook-f"></i>facebook</button>
                                <button class="btn btn-googleplus mb-2 mr-2"><i class="fab fa-google-plus-g"></i>Google</button>
                                <button class="btn btn-twitter mb-2 mr-2"><i class="fab fa-twitter"></i>Twitter</button>
                                <div class="form-group text-left mt-2">
                                    {{-- <div class="checkbox checkbox-fill d-inline">
                                        <input type="checkbox" name="checkbox-fill-2" id="checkbox-fill-2">
                                        <label for="checkbox-fill-2" class="cr">Ghi nhớ tôi </label>
                                    </div> --}}
                                </div>
                                <button type="submit" class="btn btn-primary shadow-2 mb-4">Đăng ký</button>
                                <p class="mb-2">Bạn đã có tài khoản ? <a href="{{ route('login') }}" class="f-w-400">Đăng nhập</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <img src="{{asset('asset/login/images/auth-bg.jpg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="footer mt-5">
                <p class="text-center">Made with <i class="fas fa-heart"></i> by <a href="https://codedthemes.com/" target="_blank">Codedthemes</a></p>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{asset('asset/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset/login/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/login/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
