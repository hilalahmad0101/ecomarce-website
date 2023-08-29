<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login | Admin | Pakistan Online ( Online Bazzar )</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1629651232pre.png"
        type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts and icons -->
    <script src="https://geniusdevs.com/codecanyon/omnimart40/assets/back/js/plugin/webfont/webfont.min.js"></script>
    <script id="setFont" data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/back/css/fonts.css"
        src="https://geniusdevs.com/codecanyon/omnimart40/assets/back/js/plugin/webfont/setfont.js"></script>


    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/back/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/azzara.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="login">


    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Sign In To Admin</h3>
            <div class="login-form">
                <form action="{{ route('admin.auth.make.login') }}" method="POST">
                    @csrf
                    <div class="form-group form-floating-label">
                        <input id="email" name="email" type="email" class="form-control input-border-bottom">
                        <label for="email" class="placeholder">Email Address</label>

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom">
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-secondary  btn-login">Sign In</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/back/js/jquery.3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/ready.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    @if (session()->has('success'))
        <script>
            toastr["success"]("{{ session('success') }}")
        </script>
    @elseif (session()->has('error'))
    <script>
        toastr["error"]("{{ session('error') }}")
    </script>
    @endif
</body>

</html>
