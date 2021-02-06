<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - {{__('site.title_login')}}</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>{{__('site.title_login')}}</h1>
    </div>
    <div class="login-box">
        <form class="login-form"  method="POST" action="{{ route('login') }}">
              @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                <!-- Email -->
                <div class="form-group">
                    <label class="control-label">{{ __('E-Mail Address') }}</label>
                    <input class="form-control form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email"  placeholder="Email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                </div>

                <!-- password -->
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" type="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                </div>

                <!-- Remmber me -->
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                <span class="label-text">{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- buttom -->
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
        {{--            @if (Route::has('password.request'))--}}
        {{--                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
        {{--                    {{ __('Forgot Your Password?') }}--}}
        {{--                </a>--}}
        {{--            @endif--}}
                </div>
        </form>




    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('dashboard_files/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>
