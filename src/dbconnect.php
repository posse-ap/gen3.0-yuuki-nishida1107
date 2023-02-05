<?php
// データベース接続処理
$dsn = 'mysql:dbname=posse;host=db;charset=utf8';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
        PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
    ]);
    echo '';
} catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}

// テーブル検索
$questions = $pdo->query("SELECT * FROM questions")->fetchAll(PDO::FETCH_ASSOC);
$choices = $pdo->query("SELECT * FROM choices")->fetchAll(PDO::FETCH_ASSOC);

foreach($choices as $key=>$choice){
    $index=array_search($choice["question_id"],array_column($questions,"id"));
    $questions[$index]["choices"][]=$choice;
}

    // print_r($choice);
    // echo '<br>';
    // print_r($questions);

// print_r($questions);

// 検索結果を画面表示
// foreach($questions as $question){
//     echo '<br>';
//     echo $question['id'].$question['content'].$question['image'].$question['supplement'];
//     echo '<br>';
// }
