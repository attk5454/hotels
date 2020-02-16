<?php
require_once("../database.php");
require_once("../classes.php");

//リクエストパラメータ取得
$address = 2;
if(isset($_REQUEST["address"])){
    $address = $_REQUEST["address"];
}

//データベース取得
$pdo = connectDatabase();

//実行するSQLを設定
$sql = "select * from hotels where pref like '%$address%' or city like '%$address%' or address like '%$address%';";

//SQL実行オブジェクトを取得
$pstmt = $pdo->prepare($sql);

//プレースホルダにリクエストパラメータを設定
//$pstmt->bindValue(1,$address,$address,$address);

//SQL実行
$pstmt->execute();

//結果セットを取得
$rs = $pstmt->fetchAll();

//結果セットを配列に格納
$hotels = [];
foreach ($rs as $record){
    $id = intval($record["id"]);
    $name = $record["name"];
    $price = intval($record["price"]);
    $pref  = $record["pref"];
    $city = $record["city"];
    $address = $record["address"];
    $memo = $record["memo"];
    $image = $record["image"];
    $hotel = new Hotel($id,$name,$price,$pref,$city,$address,$memo,$image);
    $hotels[] = $hotel;
}
echo(0);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>ホテル検索結果一覧</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="../assets/css/hotels.css" />
</head>

<body>
	<header>
		<h1>ホテル検索結果一覧</h1>
		<p><a href="entry.php">検索ページに戻る</a></p>
	</header>
	<main>
		<article>
			<table>
			    <?php foreach($hotels as $hotel) { ?>
				<tr>
					<td>
						<img src="../images/<?= $hotel->getImage() ?>" width="100" />
					</td>
					<td>
						<table class="detail">
							<tr>
								<td><?= $hotel->getName() ?><br /></td>
							</tr>
							<tr>
								<td><?= $hotel->getPref() ?><?= $hotel->getCity() ?><?= $hotel->getAddress() ?></td>
							</tr>
							<tr>
								<td>宿泊料：&yen;<?= $hotel->getPrice() ?></td>
							</tr>
							<tr>
								<td><?= $hotel->getMemo() ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<?php } ?>
			</table>
		</article>
	</main>
	<footer>
		<div id="copyright">(C) 2019 The Web System Development Course</div>
	</footer>
</body>

</html>