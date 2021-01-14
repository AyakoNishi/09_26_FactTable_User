<?php
session_start();
include("functions.php");
check_session_id();

// DB接続情報
$pdo = connect_to_db();

$sql = "SELECT `kind_nm` FROM `kind_table`";
$stmt = $pdo->query($sql);
$result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT `coffee_nm` FROM `coffee_table`";
$stmt = $pdo->query($sql);
$result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT `brend_nm` FROM `brend_table`";
$stmt = $pdo->query($sql);
$result3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT `hot_nm` FROM `hot_table`";
$stmt = $pdo->query($sql);
$result4 = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カフェ売り上げ実績（ファクトテーブル実践）</title>
</head>

<body>
  <form action="fact_create.php" method="POST">
    <fieldset>
      <legend>カフェ売り上げ実績（ファクトテーブル実践）</legend>
      <a href="fact_read.php">一覧画面</a>（入力例の数字で入力してください）
      <!-- <br>
      <label>種類:
        <select name="kind_cd">
          <?php foreach ($result1 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["kind_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["kind_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br>
      <label>メニュー:
        <select name="coffee_cd">
          <?php foreach ($result2 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["coffee_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["coffee_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br>
      <label>アイテム:
        <select name="brend_cd">
          <?php foreach ($result3 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["brend_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["brend_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br>
      <label>HOT/ICE:
        <select name="hot_cd">
          <?php foreach ($result4 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["hot_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["hot_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br> -->
      <div>
        種類: <input type="text" name="kind_cd">
      </div>
      <div>
        メニュー: <input type="text" name="coffee_cd">
      </div>
      <div>
        アイテム: <input type="text" name="brend_cd">
      </div>
      <div>
        ICE/HOT: <input type="text" name="hot_cd">
      </div>
      <div>
        数量: <input type="text" name="count_c">
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