<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/horizontal/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Feb 2019 17:08:43 GMT -->
<head>
    @include('_partials_.meta')
    @include('_partials_.css')

</head>

<body>
     @include('_partials_.loader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../assets/images/background/loginback2.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('dealer.login') }}" method="post">
                  @csrf
                    <a href="javascript:void(0)" class="text-center db"><img src="../assets/images/logo.png" style="width: 100px;" alt="Home" /></a>
                    <div class="form-group m-t-40">
                    <h2>Dealer Login</h2>
                        <div class="col-xs-12">
                          <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="dlr_code" value="{{ old('email') }}"  autofocus placeholder="e-mail">

                          @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="******">

                          @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex no-block align-items-center">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="checkbox-signup" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <div class="ml-auto">
                                <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Don't have an account? <a href="#" class="text-primary m-l-5"><b>Sign Up</b></a>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="https://wrappixel.com/demos/admin-templates/material-pro/horizontal/index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
      @include('_partials_.js')
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/horizontal/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Feb 2019 17:08:43 GMT -->
</html>
