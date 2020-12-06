<?php
// POSTメソッドでリクエストした値を取得
$member_id = $_POST['member_id'];
$room_id = $_POST['room_id'];
$body = $_POST['body'];

// データベース接続
// $host = localhostで動かなければipアドレスを記載
$host = '127.0.0.1';
// データベース名
$dbname = 'foreignchat';
// ユーザー名
$dbuser = 'app3';
// パスワード
$dbpass = 'password';

// データベース接続クラスPDOのインスタンス$dbhを作成する
try {
    $dbh = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbuser, $dbpass);
// PDOExceptionクラスのインスタンス$eからエラーメッセージを取得
} catch (PDOException $e) {
    // 接続できなかったらvar_dumpの後に処理を終了する
    var_dump($e->getMessage());
    exit;
}

// データ追加用SQL
// 値はバインドさせる
$sql = "INSERT INTO chats(member_id,room_id,body) VALUES(?,?,?)";
// SQLをセット
$stmt = $dbh->prepare($sql);
// SQLを実行
$stmt->execute(array($member_id,$room_id,$body));

// 先ほど追加したデータを取得
// idはlastInsertId()で取得できる
$last_id = $dbh->lastInsertId();
// データ追加用SQL
// 値はバインドさせる
$sql = "SELECT id, member_id, room_id, body FROM chats WHERE id = ?";
// SQLをセット
$stmt = ($dbh->prepare($sql));
// SQLを実行
$stmt->execute(array($last_id));

// あらかじめ配列$productListを作成する
// 受け取ったデータを配列に代入する
// 最終的にhtmlへ渡される
$productList = array();

// fetchメソッドでSQLの結果を取得
// 定数をPDO::FETCH_ASSOC:に指定すると連想配列で結果を取得できる
// 取得したデータを$productListへ代入する
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $productList[] = array(
        'id'    => $row['id'],
        'member_id'  => $row['member_id'],
        'room_id' => $row['room_id'],
        'body' => $row['body']
    );
}