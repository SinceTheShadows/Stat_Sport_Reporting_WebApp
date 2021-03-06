<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Log In | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
        
        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{ asset('assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="authentication-bg" data-layout-config='{"darkMode":false}'>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                               
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <!-- <span><img src="assets/images/logo.png" alt="" height="18"></span> -->
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and token to access admin panel.</p>
                                </div>
                                <div class="text-center w-75 m-auto">
                                    <div class="result">
                                        @if(Session::get('fail'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('fail')}}
                                        </div>
                                        @endif
                                        @if($errors->any())
                                            <h5>{{$errors->first()}}</h5>
                                        @endif
                                   </div>
                                </div>


                                <form action="{{ route('auth.check') }}" method="post">
                                @csrf
                                
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email" value="{{ old ('email') }}">
                                        <!-- <span class="text-danger"> @error('email') {{ $message }} @enderror </span> -->
                                    </div>
                                    

                                    <div class="mb-3">
                                        <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your Token?</small></a>
                                        <label for="token" class="form-label">Token</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="token" id="token" class="form-control" placeholder="Enter your Token">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        <!-- <span class="text-danger"> @error('token') {{ $message }} @enderror </span> -->
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        {!! NoCaptcha::display() !!}
                                        {!! NoCaptcha::renderJs('fr', false, 'onloadCallback') !!}
                                        @error('g-recaptcha-response')
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->


                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2018 - 2021 ?? CopyRight
        </footer>

        <!-- bundle -->
        <script src="{{ asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{ asset('assets/js/app.min.js')}}"></script>
        <script type="text/javascript">
            var onloadCallback = function() {
              alert("grecaptcha is ready!");
            };
          </script>
        
    </body>
</html>
