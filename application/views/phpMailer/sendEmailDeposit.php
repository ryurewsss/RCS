<?php
    use PHPMailer\PHPMailer\PHPMailer;
    $val = $select[0];
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        require_once $_SERVER['DOCUMENT_ROOT'].'/CRS/application/views/transaction/transactionStatus.php';
        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "carrentsystemSE8@gmail.com"; // enter your email address
        $mail->Password = "Zxcvbnm+"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        
        if($user_type==1){
            $mail->setFrom($contact['email'], "Car Rental System");
            $mail->addAddress($contact['email']); // Send to mail
        }else{
            $mail->setFrom($val->user_email, "Car Rental System");
            $mail->addAddress($val->user_email); // Send to mail
        }
        
        $mail->AddEmbeddedImage(dirname(__DIR__,3)."\img\car_img\\".$val->car_image, "car_img");
        $mail->AddEmbeddedImage(dirname(__DIR__,3)."\img\car_deposit_img\\".$val->car_proof_image, "car_proof_image");

        $mail->CharSet = 'UTF-8';
        $mail->Subject = $emailStatus[$val->transaction_status];
        // $mail->Body = $detail;
        $mail->Body = '
        <br>
        <h2>รูปรถยนต์ที่ต้องการฝากเช่า : </h2>
        <img style="max-width: 400px; max-height: 400px" src="cid:car_img">
        <h2>ทะเบียน : '.$val->car_registration.'</h2>
        <h2>รุ่นและยี่ห้อ : '.$val->car_brand_name_en.' '.$val->car_model_name.'</h2>
        <h2>ราคาต่อวัน : '.$val->car_price.'</h2>
        <h2>ชื่อผู้ฝากเช่า : '.$val->user_fname.' '.$val->user_lname.'</h2>
        <h2>เบอร์ติดต่อผู้ฝากเช่า : '.$val->user_phone.'</h2>
        ';
        // 7 ฝาก 8 ปฏิ 9ผ่าน 12แก้
        if($val->transaction_status == 7 || $val->transaction_status == 8 || $val->transaction_status == 9 || $val->transaction_status == 12){
            $mail->Body = $mail->Body.'
            <h2>เอกสารความเป็นเจ้าของ : </h2>
            <img style="max-width: 400px; max-height: 400px" src="cid:car_proof_image">
            <br>
            ';
            if($val->transaction_status == 7){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารความเป็นเจ้าของ : <span style="color:#4e73df">รอการยืนยันเอกสาร</span></h2>
            ';
            }
            if($val->transaction_status == 8){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารความเป็นเจ้าของ : <span style="color:#e74a3b">เอกสารถูกปฏิเสธ</span> กรุณาแก้ไขใหม่</h2>
            <h2>สาเหตุที่ปฏิเสธ : '.$val->car_reject_deposit.'</h2>
            ';
            }
            if($val->transaction_status == 9){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารความเป็นเจ้าของ : <span style="color:#1cc88a">เอกสารผ่าน</span> </h2>
            ';
            }
            if($val->transaction_status == 12){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารความเป็นเจ้าของ : <span style="color:#4e73df">อยู่ระหว่างการแก้ไข</span> รอการยืนยันเอกสาร</h2>
            ';
            }
        }
        
        $mail->Body = $mail->Body.'
        <br>
        ---------------------------------------------------------------------
        <br>
        <h2>หากเกิดความผิดพลาดกรุณาติดต่อเรา</h2>
        <h2>Email  : '.$contact['email'].'</h2>
        <h2>Tel  : '.$contact['tel'].'</h2>
        <h2>Line  : '.$contact['line'].'</h2>
        <a href="'.base_url().'Car/emailConfirmDeposit?usertype='.$user_type.'&type='.$type[$val->transaction_status].'&temp='.$val->transaction_temp_id.'&token=';
        if($user_type==1){
            $mail->Body = $mail->Body.$val->transaction_lessor_token;
        }
        if($user_type==3){
            $mail->Body = $mail->Body.$val->transaction_depositor_token;
        }
        $mail->Body = $mail->Body.
        '">
            <button type="button" style="user-select: auto;background-color: #1cc88a;color: #fff;border-color: #1cc88a;border: 1px solid transparent;padding: 0.375rem 0.75rem;border-radius: 0.35rem;width:150px"><span style="font-size: 1.5em">ยืนยัน</span></button>
        </a>';
        $mail->IsHTML(true); 

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
?>