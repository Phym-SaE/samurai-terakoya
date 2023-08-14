<!DOCTYPE html>
<html lang="ja">

  <head>
    <title>PHP基礎</title>
    <meta charset="utf-8" />
  </head>

  <body>
    <h2>個人情報入力フォーム</h2>
    <form action="confirmation.php" method="post">
      <table>
        <tr>
          <td>お名前</td>
          <td>
            <input type="text" name="user_name" />
          </td>
        </tr>
        <tr>
          <td>性別</td>
          <td>
            <input type="radio" name="user_gender" value="男性" checked />男性
            <input type="radio" name="user_gender" value="女性" />女性
          </td>
        </tr>
        <tr>
          <td>職業</td>
          <td>
            <select name="user_job">
              <option value="会社員">会社員</option>
              <option value="パート">パート</option>
              <option value="アルバイト">アルバイト</option>
              <option value="無職">無職</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>メールアドレス</td>
          <td>
            <input type="email" name="user_email" />
          </td>
        </tr>
      </table>
      <input type="submit" value="送信" />
    </form>
  </body>

</html>
