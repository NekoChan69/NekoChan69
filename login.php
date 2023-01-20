<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = "Đăng nhập";
$body['header'] = '
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="/theme1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/argon.css">
';
require_once(__DIR__.'/header.php');
?>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h3 class="text-white">API SYSTEM</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <h3>API SYSTEM</h3>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.facebook.com/nguyennhatloc" target="_blank"
                            data-toggle="tooltip" data-original-title="Liên hệ facebook">
                            <i class="fab fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" target="_blank" data-toggle="tooltip"
                            data-original-title="SĐT: 0365157038">
                            <i class="fa fa-phone"></i>
                            <span class="nav-link-inner--text d-lg-none">SĐT: 0365157038</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-11">

            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent pb-5">
                            <h1>Đăng nhập</h1> <br>
                            <form role="form">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Mật khẩu" type="password" id="password">
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative ">

                                    <label class="label">
                                        <span class="text-muted"><a href="<?=BASE_URL('client/forgot-password')?>">Quên mật khẩu?</a></span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="button" id="btnLogin" class="btn btn-primary my-4">Đăng nhập</button>
                                </div>
                            </form>
                            <div class="custom-control custom-control-alternative ">

                                <label class="label">
                                    Bạn chưa có tài khoản? <a href="<?=BASE_URL('client/register')?>">Đăng ký ngay</a>
                                    </span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $("#btnLogin").on("click", function() {
        $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
            'disabled',
            true);
        $.ajax({
            url: "<?=base_url('ajaxs/client/login.php');?>",
            method: "POST",
            dataType: "JSON",
            data: {
                email: $("#email").val(),
                password: $("#password").val()
            },
            success: function(respone) {
                if (respone.status == 'success') {
                    cuteToast({
                        type: "success",
                        message: respone.msg,
                        timer: 2000
                    });
                    setTimeout("location.href = '<?=BASE_URL('');?>';", 100);
                } else {
                    cuteToast({
                        type: "error",
                        message: respone.msg,
                        timer: 2000
                    });
                }
                $('#btnLogin').html('<i class="fas fa-sign-in-alt"></i> Đăng Nhập').prop('disabled',
                    false);
            },
            error: function() {
                cuteToast({
                    type: "error",
                    message: 'Không thể xử lý',
                    timer: 5000
                });
                $('#btnLogin').html('<i class="fas fa-sign-in-alt"></i> Đăng Nhập').prop('disabled',
                    false);
            }

        });
    });
    </script>
</body>

</html>