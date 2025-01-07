<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات المدخلة
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // التحقق من صحة البيانات
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // إعداد البريد الإلكتروني
        $to = "omar.mnashat123@gmail.com"; // ضع هنا بريدك الإلكتروني
        $subject = "رسالة جديدة من موقع عين الكفيف الذكية";
        $body = "
            <h2>رسالة جديدة من المستخدم:</h2>
            <p><strong>الاسم:</strong> $name</p>
            <p><strong>البريد الإلكتروني:</strong> $email</p>
            <p><strong>الرسالة:</strong></p>
            <p>$message</p>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email" . "\r\n";
        
        // إرسال البريد الإلكتروني
        if (mail($to, $subject, $body, $headers)) {
            echo "تم إرسال رسالتك بنجاح.";
        } else {
            echo "فشل في إرسال الرسالة. يرجى المحاولة مرة أخرى.";
        }
    } else {
        echo "يرجى ملء جميع الحقول بشكل صحيح.";
    }
}
?>

