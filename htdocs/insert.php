<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbName = 'hinandb';
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
$dbUser = 'root';

//データベースへの接続
$db = new PDO($dsn, $dbUser);
//送信データの取得
$db_name = $_POST['name'];//手抜き
$db_ido = $_POST['ido'];//手抜き
$db_keido = $_POST['keido'];//手抜き
//検索実行（エラーチェックを省略している）
$sql = 'INSERT INTO hinantb (避難所名, 緯度, 経度) VALUES (:name, :ido, :keido)';
$prepare = $db->prepare($sql);
$prepare->bindValue(':name', $db_name, PDO::PARAM_STR);
$prepare->bindValue(':ido', $db_ido, PDO::PARAM_STR);
$prepare->bindValue(':keido', $db_keido, PDO::PARAM_STR);
$prepare->execute();
//結果の確認
//echo '<a href="all.php">全件表示</a>';
echo '<a href="index.php">マップを表示</a>';
