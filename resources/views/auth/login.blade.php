<!DOCTYPE html>
<html>
<!-- BEGIN: Head-->

<head>

    <title>Login</title>
    @include('layout.css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" >
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                       
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2>Welcome</h2>
                                <p class="card-text mb-2">Please log-in to your account</p>
                                  @if(Session::has('login_error'))
                                   <div class="alert alert-danger p-2" >
                                        {{ Session::get('login_error') }}
                                        @php
                                            Session::forget('login_error');
                                        @endphp
                                    </div>
                                 @endif

                                <form class="auth-login-form mt-2"  action="{{ url('admin/userlogin') }} " method="POST">
                                     @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />



                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Password</label>
                                           
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                             @error('password')
                                    
                                @enderror
                                         
                                        </div>
                                    </div>
                                  
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Log in</button>
                                </form>
                              

                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


   
</body>
<!-- END: Body-->

</html>
