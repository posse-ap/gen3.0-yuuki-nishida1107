<?php
require('../dbconnect.php');

if(isset($_POST["id"])){
    $id=$_POST["id"];

    try{
        $stmt =$pdo->prepare("DELETE FROM questions WHERE id=:id");
        $stmt->bindParam(':id',$id);
        // $stmt->execute();
        $res = $stmt->execute();

        $choices_sql = "DELETE FROM choices WHERE question_id = :id";
        $choices_stmt = $pdo->prepare($choices_sql);
        $choices_stmt->bindParam(":id", $id);
        $choices_stmt->execute();

        header('Location: ../admin/index.php');
        exit();
    }catch (PDOException $e) {
        echo $e->getMessage();
        die();
}
}
?>



