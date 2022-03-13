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
        }
        if($user_type==2){
            $mail->setFrom($val->user_email, "Car Rental System");
            $mail->addAddress($val->user_email); // Send to mail
        }
        
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $emailStatus[$val->transaction_status];
        // $mail->Body = $detail;
        $mail->Body = '
        <br>
        <h4>รุ่นและยี่ห้อ : '.$val->car_brand_name_en.' '.$val->car_model_name.'</h4>
        <h4>ทะเบียน : '.$val->car_registration.'</h4>
        <h4>สถานที่รับส่งรถเช่า : '.$val->place_name.'</h4>
        <h4>วันและเวลาที่รับ : '.date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_receive_date,0,10)))).'   '.substr($val->transaction_receive_date,11,5).' น.</h4>
        <h4>วันและเวลาที่คืน : '.date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_return_date,0,10)))).'   '.substr($val->transaction_return_date,11,5).' น.</h4>
        <h4>ยอดที่โอน : '.$val->transaction_price.'</h4>
        <h4>ชื่อผู้จอง : '.$val->user_fname.' '.$val->user_lname.'</h4>
        <h4>เบอร์ติดต่อผู้จอง : '.$val->user_phone.'</h4>
        <br>
        ติดต่อเรา
        <h4>Email  : '.$contact['email'].'</h4>
        <h4>Tel  : '.$contact['tel'].'</h4>
        <h4>Line  : '.$contact['line'].'</h4>
        <a href="'.base_url().'CRS/Transaction/emailConfirm?usertype='.$user_type.'&type='.$type[$val->transaction_status].'&temp='.$val->transaction_temp_id.'&token=';
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
            <button type="button" style="user-select: auto;background-color: #1cc88a;color: #fff;border-color: #1cc88a;border: 1px solid transparent;padding: 0.375rem 0.75rem;border-radius: 0.35rem;">ยืนยัน</button>
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