<?php

//データベース接続設定
$dbServer = '127.0.0.1';
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];
$dbName = $_SERVER['MYSQL_DB'];
# MySQL用のDSN文字列です。
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);

// DELETE文を変数に格納
$sql = "DELETE FROM hinantb WHERE ID = :ID";

// 削除するレコードのIDは空のまま、SQL実行の準備をする
$stmt = $db->prepare($sql);

// 削除するレコードが複数の場合はカンマ区切りで追加する
$params = array(0);

// foreachで削除するレコードを1件ずつループ処理
foreach ($params as $value) {

  // 配列の値を :id にセットし、executeでSQLを実行
  $stmt->execute(array(':ID' => $value));
}

// 削除完了のメッセージ
echo '削除完了しました';
