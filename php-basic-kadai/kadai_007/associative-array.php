<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>PHP基礎</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <p>
      <?php
      // 連想配列に値を代入する
      $vegetable = ['name' => 'onion', 'price' => '200', 'weight' => '160'];

      // 連想配列を出力する
      print_r($vegetable);
      ?>
    </p>

  </body>

</html>