<?php
$tranStatus = array(
    'ผิดพลาด',
    'รอการยืนยันเอกสาร',
    'เอกสารถูกปฏิเสธ',
    'เอกสารผ่าน <br> รอรับรถเช่า',
    'อยู่ระหว่างการเช่า',
    'เสร็จสิ้นการเช่า',
    'เอกสารถูกแก้ไข',

    'รอการยืนยันเอกสาร',
    'เอกสารถูกปฏิเสธ',
    'เอกสารผ่าน <br> รอรับรถสำหรับฝากเช่า',
    'อยู่ระหว่างการฝากเช่า',
    'เสร็จสิ้นการฝากเช่า',
);
$tranStatusColor = array(
    'text-secondary',
    'text-primary',
    'text-danger',
    'text-primary',
    'text-warning',
    'text-success',
    'text-primary',
    
    'text-primary',
    'text-danger',
    'text-primary',
    'text-warning',
    'text-success',
);
$emailStatus = array(
    'ผิดพลาด',
    'กรุณายืนยันการจอง',
    'เอกสารถูกปฏิเสธกรุณายืนยัน',
    'เอกสารผ่านกรุณายืนยัน',
    'ยืนยันการรับรถเช่า',
    'ยืนยันการคืนรถเช่า',
    'ยืนยันการแก้ไขเอกสาร',

    'กรุณายืนยันการฝากเช่า',
    'เอกสารถูกปฏิเสธกรุณายืนยัน',
    'เอกสารผ่านกรุณายืนยัน',
    'ยืนยันการรับรถฝากเช่า',
    'ยืนยันการคืนรถฝากเช่า',
);
$type = array(
    'error',
    'rent',
    'reject',
    'confirm',
    'receive',
    'return',
    'edit',

    'deposit',
    'deposit_reject',
    'deposit_confirm',
    'deposit_receive',
    'deposit_return',
);
$contact = array(
    'email' => 'carrentsystemSE8@gmail.com',
    'tel' => '081-xxxxxxxxx',
    'line' => '@RCS'
)
?>