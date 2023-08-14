<!DOCTYPE html>
<html lang="ja">

  <head>
    <title>PHP基礎</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <h2>入力内容をご確認ください。</h2>
    <p>お名前：<?php echo $_POST['user_name']; ?></p>
    <p>性別：<?php echo $_POST['user_gender']; ?></p>
    <p>職業：<?php echo $_POST['user_job']; ?></p>
    <p>メールアドレス：<?php echo $_POST['user_email']; ?></p>
  </body>

</html>
