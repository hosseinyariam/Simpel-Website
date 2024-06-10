<?php
$password = 'hosseinyari';
$salt = random_bytes(16); // تولید یک salt تصادفی
$options = ['cost' => 12]; // تعیین هزینه (cost) الگوریتم bcrypt
$hashed_password = password_hash($password, PASSWORD_BCRYPT, $options); // هش کردن رمز عبور با salt و الگوریتم bcrypt
echo $hashed_password; // نمایش رشته هش شده
?>