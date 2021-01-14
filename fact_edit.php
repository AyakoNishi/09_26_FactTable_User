<?php
session_start();
include("functions.php");
check_session_id();

// DB接続情報
$pdo = connect_to_db();

$id = $_GET['id'];

// データ取得SQL作成
$sql = 'SELECT id, kind_cd, coffee_cd, brend_cd, hot_cd, count_c FROM cafe_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる．
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カフェ売り上げ実績（ファクトテーブル実践）</title>
</head>

<body>
  <form action="fact_update.php" method="POST">
    <fieldset>
      <legend>カフェ売り上げ実績（ファクトテーブル実践）</legend>
      <a href="fact_read.php">一覧画面</a>（入力例の数字で入力してください）
      <div>
        種類: <input type="text" name="kind_cd" value="<?= $record["kind_cd"] ?>">
      </div>
      <div>
        メニュー: <input type="text" name="coffee_cd" value="<?= $record["coffee_cd"] ?>">
      </div>
      <div>
        アイテム: <input type="text" name="brend_cd" value="<?= $record["brend_cd"] ?>">
      </div>
      <div>
        ICE/HOT: <input type="text" name="hot_cd" value="<?= $record["hot_cd"] ?>">
      </div>
      <div>
        数量: <input type="text" name="count_c" value="<?= $record["count_c"] ?>">
      </div>
      <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>送信</button>
      </div>
    </fieldset>
  </form>

  <div>
    <h2>入力例</h2>
    <div>
      <p>種類：　1.ドリンク,　2.フード, 3.デザート</p>
      <p>メニュー：　1.珈琲,　2.紅茶, 3.フレッシュジュース, 4.ミルク</p>
      <p>アイテム：　1.ブレンド,　2.アイスコーヒー, 3.カプチーノ, 4.カフェラテ</p>
      <p>hot/ice：　1.hot,　2.ice</p>

    </div>
  </div>

</body>

</html>