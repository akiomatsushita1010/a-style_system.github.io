<?php
// 送信先メールアドレス
$to = "your-mail@example.com";  // ← 明男のメールアドレスに変更

// フォームからの値を取得
$name    = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$email   = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$subject = htmlspecialchars($_POST["subject"], ENT_QUOTES, "UTF-8");
$message = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");

// メール件名
$mail_subject = "【A-style System】お問い合わせ: " . $subject;

// メール本文
$mail_body  = "以下の内容でお問い合わせがありました。\n\n";
$mail_body .= "お名前: " . $name . "\n";
$mail_body .= "メール: " . $email . "\n";
$mail_body .= "件名: " . $subject . "\n\n";
$mail_body .= "お問い合わせ内容:\n" . $message . "\n";

// 送信元
$headers = "From: " . $email;

// メール送信
mb_language("Japanese");
mb_internal_encoding("UTF-8");

if (mb_send_mail($to, $mail_subject, $mail_body, $headers)) {
    header("Location: thanks.html");
    exit;
} else {
    echo "送信に失敗しました。";
}
?>