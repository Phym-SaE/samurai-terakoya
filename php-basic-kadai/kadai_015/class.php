<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>PHP基礎</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <p>
      <?php
      class Food {
        private $name;
        private $price;

        // コンストラクタを定義
        public function __construct(string $name, int $price) {
          $this->name = $name;
          $this->price = $price;
        }

        // メソッドを定義
        public function set_price(int $price) {
          $this->price = $price;
        }
        public function show_price() {
          echo $this->price . '<br>';
        }
      }
      // インスタンス化
      $potato = new Food('potato', 250);
      print_r($potato);

      echo '<br>';
      // メソッドにアクセス
      $potato->show_price();

      echo '<br>';

      class Animal {
        private $name;
        private $height;
        private $weight;

        // コンストラクタを定義
        public function __construct(string $name, int $height, int $weight) {
          $this->name = $name;
          $this->height = $height;
          $this->weight = $weight;
        }

        // メソッドを定義
        public function set_height(int $height) {
          $this->height = $height;
        }
        public function show_height() {
          echo $this->height;
        }
      }
      // インスタンス化
      $dog = new Animal('dog', 60, 5000);
      print_r($dog);
      
      echo '<br>';
      // メソッドにアクセス
      $dog->show_height();
      ?>
    </p>

  </body>

</html>