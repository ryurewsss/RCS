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
        }else if($user_type==2){
            $mail->setFrom($val->user_email, "Car Rental System");
            $mail->addAddress($val->user_email); // Send to mail
        }else if($user_type==3){
            $mail->setFrom($depositor_email[0]->user_email, "Car Rental System");
            $mail->addAddress($depositor_email[0]->user_email); // Send to mail
        }
        $mail->AddEmbeddedImage(dirname(__DIR__,3)."\img\car_img\\".$val->car_image, "car_img");
        $mail->AddEmbeddedImage(dirname(__DIR__,3)."\img\user_doc_img\\".$val->user_doc_iden_image, "user_doc_iden_image");
        $mail->AddEmbeddedImage(dirname(__DIR__,3)."\img\user_doc_img\\".$val->user_doc_license_image, "user_doc_license_image");
        $mail->AddEmbeddedImage(dirname(__DIR__,3)."\img\\transaction_img\\".$val->transaction_image, "transaction_image");

        $mail->CharSet = 'UTF-8';
        $mail->Subject = $emailStatus[$val->transaction_status];
        // $mail->Body = dirname(__DIR__,3)."\img\car_img\\".$val->car_image.'Embedded Image: <img alt="PHPMailer" src="cid:car"> Here is an image!';
        $mail->Body = '
        <br>
        <img style="max-width: 400px; max-height: 400px" src="cid:car_img">
        <h2>รุ่นและยี่ห้อ : '.$val->car_brand_name_en.' '.$val->car_model_name.'</h2>
        <h2>ทะเบียน : '.$val->car_registration.'</h2>
        <h2>สถานที่รับส่งรถเช่า : '.$val->place_name.'</h2>
        <h2>วันและเวลาที่รับ : '.date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_receive_date,0,10)))).'   '.substr($val->transaction_receive_date,11,5).' น.</h2>
        <h2>วันและเวลาที่คืน : '.date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_return_date,0,10)))).'   '.substr($val->transaction_return_date,11,5).' น.</h2>
        <h2>ยอดที่โอน : '.$val->transaction_price.'</h2>
        <h2>ชื่อผู้จอง : '.$val->user_fname.' '.$val->user_lname.'</h2>
        <h2>เบอร์ติดต่อผู้จอง : '.$val->user_phone.'</h2>
        ';
        // 2 ปฏิ 3ผ่าน 6แก้
        if($val->transaction_status <= 3 || $val->transaction_status == 6){
            $mail->Body = $mail->Body.'
            <h2>เอกสารระบุตัวตน : </h2>
            <img style="max-width: 400px; max-height: 400px" src="cid:user_doc_iden_image">
            <h2>ใบอนุญาตขับขี่ : </h2>
            <img style="max-width: 400px; max-height: 400px" src="cid:user_doc_license_image">
            ';
            if($val->transaction_status == 2 && $val->transaction_iden_approve == 0){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารระบุตัวตนและใบอนุญาตขับขี่ : <span style="color:#e74a3b">เอกสารถูกปฏิเสธ</span> กรุณาแก้ไขใหม่</h2>
            <h2>สาเหตุที่ปฏิเสธ : '.$val->transaction_reject_iden.'</h2>
            ';
            }
            if($val->transaction_status == 2 && $val->transaction_iden_approve == 1){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารระบุตัวตนและใบอนุญาตขับขี่ : <span style="color:#1cc88a">เอกสารส่วนนี้ผ่าน</span> </h2>
            ';
            }

            $mail->Body = $mail->Body.'
            <h2>หลักฐานการโอนเงิน : </h2>
            <img style="max-width: 400px; max-height: 400px" src="cid:transaction_image">
            <br>
            ';
            if($val->transaction_status == 2 && $val->transaction_transfer_approve == 0){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารหลักฐานการโอนเงิน : <span style="color:#e74a3b">เอกสารถูกปฏิเสธ</span> กรุณาแก้ไขใหม่</h2>
            <h2>สาเหตุที่ปฏิเสธ : '.$val->transaction_reject_transfer.'</h2>
            ';
            }
            if($val->transaction_status == 2 && $val->transaction_transfer_approve == 1){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสารระบุตัวตนและใบอนุญาตขับขี่ : <span style="color:#1cc88a">เอกสารส่วนนี้ผ่าน</span> </h2>
            ';
            }

            if($val->transaction_status == 3){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสาร : <span style="color:#1cc88a">เอกสารผ่าน</span> กรุณามารับรถเช่าภายในระยะเวลา</h2>
            ';
            }//ผ่านทั้งคู่
            if($val->transaction_status == 6){
            $mail->Body = $mail->Body.'
            <h2>สถานะเอกสาร : <span style="color:#4e73df">อยู่ระหว่างการแก้ไข</span> รอการยืนยันเอกสาร</h2>
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
        <a href="'.base_url().'Transaction/emailConfirm?usertype='.$user_type.'&type='.$type[$val->transaction_status].'&temp='.$val->transaction_temp_id.'&token=';
        if($user_type==1){
            $mail->Body = $mail->Body.$val->transaction_lessor_token;
        }
        if($user_type==2){
            $mail->Body = $mail->Body.$val->transaction_rental_token;
        }
        if($user_type==3){
            $mail->Body = $mail->Body.$val->transaction_depositor_token;
        }
        $mail->Body = $mail->Body.
        '">
            <button type="button" style="user-select: auto;background-color: #1cc88a;color: #fff;border-color: #1cc88a;border: 1px solid transparent;padding: 0.375rem 0.75rem;border-radius: 0.35rem;width:150px"><span style="font-size: 1.5em">ยืนยัน</span></button>
        </a>';

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
?>