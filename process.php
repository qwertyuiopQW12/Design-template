<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات من النموذج
    $companyName = htmlspecialchars($_POST['companyName']);
    $logoType = htmlspecialchars($_POST['logoType']);
    $fontType = htmlspecialchars($_POST['fontType']);
    $designElements = htmlspecialchars($_POST['designElements']);
    $designFocus = htmlspecialchars($_POST['designFocus']);
    $details = htmlspecialchars($_POST['details']);
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);

    // إعداد البريد الإلكتروني
    $to = "asmaeilimajdi@gmail.com";
    $subject = "طلب تصميم شعار جديد من $name";
    $message = "
        <html>
        <head>
        <title>طلب تصميم شعار جديد</title>
        </head>
        <body>
        <h2>تفاصيل الطلب</h2>
        <p><strong>اسم الشركة:</strong> $companyName</p>
        <p><strong>نوع الشعار:</strong> $logoType</p>
        <p><strong>نوع الخط:</strong> $fontType</p>
        <p><strong>عناصر الشعار:</strong> $designElements</p>
        <p><strong>نوع التصميم:</strong> $designFocus</p>
        <p><strong>تفاصيل الشعار:</strong> $details</p>
        <p><strong>اسم العميل:</strong> $name</p>
        <p><strong>رقم الهاتف:</strong> $phone</p>
        </body>
        </html>
    ";

    // إعداد الهيدر
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@fusionpro.com" . "\r\n";

    // إرسال البريد الإلكتروني
    if (mail($to, $subject, $message, $headers)) {
        echo "تم إرسال الطلب بنجاح. شكرًا لتواصلك معنا!";
    } else {
        echo "حدث خطأ أثناء إرسال الطلب. حاول مرة أخرى لاحقًا.";
    }
} else {
    echo "طلب غير صالح.";
}
?>