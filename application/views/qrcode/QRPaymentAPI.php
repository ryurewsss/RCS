<?Php
require_once("lib/PromptPayQR.php");

$PromptPayQR = new PromptPayQR(); // new object
$PromptPayQR->size = 4; // Set QR code size to 8
// $PromptPayQR->id = '0841079779'; // PromptPay ID
// $PromptPayQR->amount = 200.25; // Set amount (not necessary)
$PromptPayQR->id = $tel; // PromptPay ID
$PromptPayQR->amount = (int)$price; // Set amount (not necessary)
echo '<img src="' . $PromptPayQR->generate() . '" />';