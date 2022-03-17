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
    'เอกสารถูกแก้ไข',
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
    'text-primary',
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
    'ยืนยันการแก้ไขเอกสาร',
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
    'deposit_edit',
);
$contact = array(
    'email' => 'carrentsystemSE8@gmail.com',
    'tel' => '080-942-5365',
    'line' => '@RCS'
)
?>