<?php
require_once "funx.php";
?>
<?php
// セッションを開始
session_start();

// セッションからカートを取得
$cart = null;
if (isset($_SESSION["cart"])) {
	$cart = $_SESSION["cart"];
} else {
	$cart = [];
}

// リクエストパラメータを取得
$id = -1;
if (isset($_REQUEST["id"])) {
	$id = $_REQUEST["id"];
}
$mode = "";
if (isset($_REQUEST["mode"])) {
	$mode = $_REQUEST["mode"];
}

// リクエストパラメータに対応する楽器を取得
if ($id > -1) {
	$items = createItems();
	$item = $items[$id];
	// カートに選択された楽器を追加
	$cart[] = $item;
	// セッションに再設定する
	$_SESSION["cart"] = $cart;
}

// カートのクリア処理
if ($mode === "clear") {
	$cart = [];
	unset($_SESSION["cart"]);
	session_destroy();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ccmc-04 - ショップシステム</title>
	<link rel="stylesheet" href="../../assets/css/style.css" />
	<link rel="stylesheet" href="../../assets/css/ccmc-03.css" />
	<link rel="stylesheet" href="../../assets/css/ccmc-04.css" />	
</head>

<body>
	<h1>ショップシステム</h1>
	<p><a href="shop.php">買い物を続ける</a>　<a href="cart.php?mode=clear">カートをクリアする</a></p>
	<?php if (count($cart) === 0) { ?>
		<p>カートに商品は入っていません。</p>
	<?php } else { ?>
	<table>
		<tr>
			<th>楽器名</th>
			<th>価格</th>
			<th></th>
		</tr>
		<?php foreach ($cart as $product) { ?>
		<tr>
			<td><?= $product->getName() ?></td>
			<td><?= $product->getPrice() ?>円</td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>

</html>
