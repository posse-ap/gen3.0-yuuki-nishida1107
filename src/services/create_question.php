<?php
require('../dbconnect.php');

$content = $_POST['content'];
$supplement = isset($_POST['supplement']) ? $_POST['supplement'] : null;
$valid = $_POST['valid'];

if (isset($_POST["upload"])) {
    //画像の名前をユニーク(一意)に設定している。また、画像の拡張子も取得している。
    $image_name = uniqid(mt_rand(), true) . '.' . substr(strrchr($_FILES["image"]["name"], '.'), 1);
    $image_path = dirname(__FILE__) . '/../img/quiz/' . $image_name;
    // サーバ上で一時的にtmp_nameとして保存されている画像ファイルを、本来移動したい場所に移す。
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
};

try{$questions_stmt=$pdo->prepare("INSERT INTO questions (content,image,supplement) VALUES (:content,:image,:supplement)");
$questions_stmt->bindParam(':content',$content);
$questions_stmt->bindParam(':image',$image_name);
$questions_stmt->bindParam(':supplement',$supplement);
$questions_stmt->execute();


$question_id = intval($pdo->lastInsertId());
$valid_true = 1;
$valid_false = 0;

for($i=1;$i<=3;$i++){
    $choice=$_POST["choices$i"];

    $choice_stmt=$pdo->prepare("INSERT INTO choices (question_id,name,valid) VALUE (:question_id,:name,:valid)");
    $choice_stmt->bindParam(":question_id",$question_id);
    $choice_stmt->bindParam(":name",$choice);

    if($i==$valid){
        $choice_stmt->bindParam(":valid",$valid_true);
    }else{
        $choice_stmt->bindParam(":valid",$valid_false);
    }
    $choice_stmt->execute();
}
header('Location: ../admin/index.php');
exit();

} catch (PDOException $e) {
echo $e->getMessage();
die();
}




