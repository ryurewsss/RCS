<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
.card-body{
    background-color: #032246;
    border-radius: 25px;
}
label,h3,h4{
    color: #fcfcfc;
}
img{
    display: block;
    margin-left: auto;
    margin-right: auto;
}

</style>

<body class="login-body">

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8">
                                <div class="p-5">
                                    <form id="login-form" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <img src="assets/img/map.png" width="120" height="120"><br><br>
                                            <h3 class="text-center text-login m-b-20">RMAP</h3>
                                            <h3 class="text-center text-login m-b-20">Login</h3>
                                        </div>
                                        <div class="row">
                                            <label style="margin-right: 35px;">Username :</label>
                                        </div>
                                        <div class="row">
                                            <input type="text" name="login[]" id="user_username" tabindex="1" class="form-control" placeholder="username" value="" autocomplete="off" required>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label style="margin-right: 15px;">Password :</label>  
                                        </div>
                                        <div class="row">
                                            <input type="password" name="login[]" id="user_password" tabindex="2" class="form-control" placeholder="password" required>
                                            <i class="far fa-eye" style="margin-left: -30px; margin-top: 10px; cursor: pointer;" id="togglePassword"></i>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6" style="text-align:center;">
                                                <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label>Remember me</label>
                                            </div>
                                            <div class="col-lg-6" style="text-align:center;">
                                                <label>Forgot the password?</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <input type="submit" id="login-submit" class="form-control btn btn-info btn-user btn-block" value="Submit">
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label style="cursor: pointer;" id="register-form-link">Register now</label>
                                            </div>
                                            <div class="col-lg-6" style="text-align:right;">
                                                <label>Resend email verification</label>
                                            </div>
                                        </div>
                                        <!-- <label style="margin-left: 20px;" id="loginError" class="text-danger"></label> -->
                                    </form>



                                    <form id="register-form" method="post" role="form" style="display: none;">
                                        <div class="form-group">
                                        <img src="assets/img/map.png" width="120" height="120"><br><br>
                                            <h3 class="text-center text-login m-b-20">RMAP</h3>
                                            <h4 class="text-center text-login m-b-20">Register</h4>
                                        </div>

                                        <div class="row">
                                            <label style="margin-right: 35px;">Email :</label>
                                        </div>
                                        <div class="row">
                                            <input type="email" name="register[]" id="user_email" tabindex="1" class="form-control" placeholder="email" value="" required>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <label style="margin-right: 35px;">Username :</label>
                                        </div>
                                        <div class="row">
                                            <input type="text" name="register[]" id="user_username" tabindex="1" class="form-control" placeholder="username" value="" required>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <label style="margin-right: 35px;">Password :</label>
                                        </div>
                                        <div class="row">
                                            <input type="password" name="register[]" id="user_password" tabindex="2" class="form-control" placeholder="password" required>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <label style="margin-right: 35px;">Confirm Password :</label>
                                        </div>
                                        <div class="row">
                                            <input type="password" id="confirm_password" tabindex="2" class="form-control" placeholder="confirm password" required>
                                        </div>
                                        <br>
                                        <br>
                                        
                                        <div class="row">
                                            <input type="submit" id="register-submit" tabindex="4" class="form-control btn btn-info btn-user btn-block" value="Confirm">
                                        </div>
                                        <br>

                                        <div class="row">
                                            <label style="cursor: pointer;" id="login-form-link">Go to Login</label>
                                        </div>
                                        <!-- <label style="margin-left: 20px;" id="regisError" class="text-danger"></label> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</html>
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>

<script>
    $('#togglePassword').click(function(e) {
        if($('#user_password[name="login[]"]').attr('type') === 'password'){
            $('#user_password[name="login[]"]').attr('type','text');
            $(this).removeClass('far fa-eye');
            $(this).addClass('far fa-eye-slash');
        }else{
            $('#user_password[name="login[]"]').attr('type','password');
            $(this).removeClass('far fa-eye-slash');
            $(this).addClass('far fa-eye');
        }
    });
    
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

    $('#register-form').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var formData = {};
        $("[name^='register']").each(function() {
            formData[this.id] = this.value;
        });
        if(formData['user_password'] == $('#confirm_password').val()){
            $.ajax({
                method: "POST",
                url: "Login/checkUsername",
                data: formData,
            }).done(function(returnData) {
                console.log(returnData)
                
                if (!returnData) {
                    $.ajax({
                        method: "POST",
                        url: "Login/checkEmail",
                        data: formData,
                    }).done(function(returnData) {
                        console.log(returnData)
                        if (!returnData) {
                            $.ajax({
                                method: "POST",
                                url: "Login/addUser",
                                data: formData,
                            }).done(function(returnData) {
                                console.log(returnData)

                                $.ajax({
                                    method: "POST",
                                    url: "Login/sendEmail",
                                    data: formData,
                                }).done(function(returnData) {
                                    console.log(returnData)
                                });
                            });
                        } else {
                            alert('Email is already use');
                        }
                    });
                } else {
                    alert('Username is already use');
                }
            });
        }else{
            alert('Password does not match');
        }
    })

    $('#login-form').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var formData = {};
        $("[name^='login']").each(function() {
            formData[this.id] = this.value;
        });
        $.ajax({
            method: "POST",
            url: "Login/login",
            data: formData,
        }).done(function(returnData) {
            if (returnData.login == 'True') {
                var new_url = "<?php echo isset($_SESSION['url'])?$_SESSION['url']:base_url(); ?>"
                window.location.replace(new_url);
                $('#loginError').html('');
            } else {
                alert('The password or username is incorrect');
            }
        });
    })
</script>