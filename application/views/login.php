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

</head>
<style>
.card-body{
    background-color: #48AAAD;
}
label,h3,h4{
    color: #fcfcfc;
}
img{
    margin-left: 38%;
}
.text-login{
    margin-left: 10%;
}

    /* .login-register{
        background-image : url("<?= base_url() ?>assets/img/CRS.jpg");
        background-size: 600px;
        background-color: #cccccc;
    }

    .login-body {
        background-color: #f2f2f2;
    } */
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
                            <!-- <div class="col-lg-6 d-none d-lg-block login-register"></div> -->
                            <div class="col-md-3 register-left">
                                <!-- <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/> -->
                                <!-- <h3>Welcome</h3>
                                <p>ระบบเช่ารถยนต์</p> -->
                                <!-- <input type="submit" name="" value="Login"/><br/> -->
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <p hidden id="base_url"><?php echo base_url(); ?></p>

                                    <form id="login-form" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                        <img src="assets/img/iconcar.png" width="120" height="120"><br><br>
                                        <h4 class="text-center text-login m-b-20">เข้าสู่ระบบ</h4>
                                        <!-- <h4 class="text-center m-b-20">ระบบเช่ารถยนต์</h4> -->
                                        </div>
                                        
                                        <div class="row">
                                            <label style="margin-right: 25px;">อีเมลล์ :</label>  
                                            <input type="email" style="width: 270px;" name="login[]" id="user_email" tabindex="1" class="form-control" placeholder="อีเมลล์" value="">
                                        </div><br>
                                        <div class="row">
                                            <label style="margin-right: 15px;">รหัสผ่าน :</label>  
                                            <input type="password" style="width: 270px;" name="login[]" id="user_password" tabindex="2" class="form-control" placeholder="รหัสผ่าน">
                                        </div>

                                        <br><br>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" id="login-submit" tabindex="4" class="form-control btn btn-primary btn-user btn-block" value="เข้าสู่ระบบ">
                                                </div>
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="button" class="form-control" id="register-form-link" value="สมัครสมาชิก">
                                                    <!-- <a class="small" id="register-form-link" >Create an Account!</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <label style="margin-left: 20px;" id="loginError" class="text-danger"></label>
                                    </form>

                                    <form id="register-form" method="post" role="form" style="display: none;">
                                        <div class="form-group">
                                        <img src="assets/img/iconcar.png" width="120" height="120"><br><br>
                                            <h4 class="text-center text-login m-b-20">สมัครสมาชิก</h4>
                                        </div>
                                        <div class="row">
                                            <label style=" margin-right: 63px;">อีเมลล์ :</label>  
                                            <input type="email" style="width: 235px;" name="register[]" id="user_email" tabindex="1" class="form-control" placeholder="อีเมลล์" value="">
                                        </div><br>
                                        <div class="row">
                                            <label style=" margin-right: 86px;">ชื่อ :</label>  
                                            <input type="text" style="width: 235px;" name="register[]" id="user_fname" tabindex="1" class="form-control" placeholder="ชื่อ" value="">
                                        </div><br>
                                        <div class="row">
                                            <label style=" margin-right: 49px;">นามสกุล :</label>  
                                            <input type="text" style="width: 235px;" name="register[]" id="user_lname" tabindex="1" class="form-control" placeholder="นามสกุล" value="">
                                        </div><br>
                                        <div class="row">
                                            <label style=" margin-right: 52px;">รหัสผ่าน :</label>  
                                            <input type="password" style="width: 235px;" name="register[]" id="user_password" tabindex="2" class="form-control" placeholder="รหัสผ่าน">
                                        </div><br>
                                        <div class="row">
                                            <label style=" margin-right: 10px;">รหัสผ่านอีกครั้ง :</label>  
                                            <input type="password" style="width: 235px;" id="confirm-password" tabindex="2" class="form-control" placeholder="รหัสผ่านอีกครั้ง">
                                        </div><br>
                                        <div class="row">
                                            <label style=" margin-right: 18px;">เบอร์โทรศัพท์ :</label>  
                                            <input type="tel" style="width: 235px;" name="register[]" id="user_phone" tabindex="2" class="form-control" placeholder="เบอร์โทรศัพท์" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
                                        </div>

                                        <br><br>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" id="register-submit" tabindex="4" class="form-control btn btn-primary btn-user btn-block" value="ยืนยันสมัครสมาชิก">
                                                </div>
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="button" class="active form-control" id="login-form-link" value="ลงชื่อเข้าสู่ระบบ">
                                                </div>
                                            </div>
                                        </div>
                                        <label style="margin-left: 20px;" id="regisError" class="text-danger"></label>
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
        var pass = true;


        var tableData = {};
        tableData['tableName'] = 'crs_user';
        tableData['user_email'] = formData['user_email'];
        tableData['columnName'] = 'user_email';
        $.ajax({
            method: "POST",
            url: "Login/checkUsername",
            data: tableData,
        }).done(function(returnData) {
            console.log(returnData)
            //return false = pass
            if (formData['user_email'] == '' || formData['user_password'] == '' || $('#confirm-password').val() == '') {
                $('#regisError').html('Please fill in the correct details.');
                // $('#regisError').html('กรุณากรอกรายละเอียดให้ถูกต้อง');
                pass = false;
            }
            if (formData['user_password'] != $('#confirm-password').val()) {
                $('#regisError').html('Please fill in the correct details.');
                // $('#regisError').html('กรุณากรอกรายละเอียดให้ถูกต้อง');
                pass = false;
            }
            if (!returnData && pass) {
                $.ajax({
                    method: "POST",
                    url: "Login/addUser",
                    data: {
                        arrayData: formData
                    },
                }).done(function(returnData) {
                    alert('สมัครสำเร็จ')

                    $("#login-form").delay(100).fadeIn(100);
                    $("#register-form").fadeOut(100);
                    $('#register-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
            } else {
                $('#regisError').html('บัญชีผู้ใช้ซ้ำ');
            }
        });
    })

    $('#login-form').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var formData = {};
        $("[name^='login']").each(function() {
            formData[this.id] = this.value;
        });
        var pass = true;
        console.log(formData);
        if (formData['user_email'] == '' || formData['user_password'] == '') {
            // alert("ASD")
            $('#loginError').html('Please fill in the correct details.');
            // $('#loginError').html('กรุณากรอกรายละเอียดให้ถูกต้อง');
            pass = false;
        }
        if (pass) {
            $.ajax({
                method: "POST",
                url: "Login/login",
                data: formData,
            }).done(function(returnData) {
                if (returnData.login == 'True') {
                    console.log("ASD")
                    window.location.replace($('#base_url').html());
                    $('#loginError').html('');
                } else {
                    // $.toast({
                    //     heading: 'ไม่สำเร็จ',
                    //     text: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                    //     position: 'top-right',
                    //     loaderBg: '#ff6849',
                    //     icon: 'error',
                    //     hideAfter: 3500,
                    //     stack: 3
                    // });
                    // $('#loginError').html('รหัสผ่านหรือบัญชีผู้ใช้ไม่ถูกต้อง');
                    $('#loginError').html('The password or username is incorrect');
                }
            });
        }
    })
</script>