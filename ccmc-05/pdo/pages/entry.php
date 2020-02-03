<?php
//外部ファイルを読み込む
require_once("../database.php");
require_once("../classes.php");
//データベース接続オブジェクトを取得
$pdo = connectDatabase();
//sql を設定
$sql = "select * from areas";
// SQL実行
$pstmt = $pdo->prepare($sql);
//sql
$pstmt->execute();
//結果セット取得
$rs = $pstmt->fetchAll();
//データベース接続オブジェクトを
disconnectDatabase($pdo);
//結果セットを配列
$areas = [];
foreach ($rs as $record) {
    $id = intval($record["id"]);
    $name = $record["name"];
    $area = new Area($id, $name);
    $areas[] = $area;
}

//結果セットの確認
/* echo "<pre>";
var_dump($areas);
echo "</pre>";
exit(0);
*/

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<title>PDOを使ってみる</title>
	</head>
	<body>
		<h1>PDOを使ってみる</h1>
		<h2>地域を選択する</h2>
		<form action="restaurants.php" method="get">
		<select name="area">
			<option value="0">-- 選択してください --</option>
			<?php foreach ($areas as $area) { ?>
			<option value = "<?= $area->getId() ?>"><?= $area->getName() ?></option>
			<?php } ?>
			<!--<option value="1">福岡</option>
			<option value="2">神戸</option>
			<option value="2">神戸</option>
			<option value="3">伊豆</option> -->
		</select>
		<input type="submit" value="選択" />
		</form>
	</body>
</html>
