<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>PHP基礎</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <p>
      <?php
      $vegetable = [
        '名前' => '玉ねぎ',
        '値段' => 200,
        '産地' => '北海道'
      ];
      foreach ($vegetable as $key => $value) {
        echo "{$key}：{$value}<br>";
      }
      ?>
    </p>

  </body>

</html>