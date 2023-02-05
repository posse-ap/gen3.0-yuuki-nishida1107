<?php
require('../dbconnect.php');
if (!isset($_SESSION["id"])) {
    header('Location: /admin/auth/signin.php');
  }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSSE 管理画面ダッシュボード</title>
    <!-- スタイルシート読み込み -->
    <link rel="stylesheet" href="./admin.css">
    <!-- Google Fonts読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
<?php
include('../components/admin/header.php');
?>
    <div class="wrapper">
        <aside>
            <nav>
                <ul>
                    <li><a href="/admin/users/invitation.php">ユーザー招待</a></li>
                    <li><a href="/admin/index.php">問題一覧</a></li>
                    <li><a href="/admin/questions/create.php">問題作成</a></li>
                </ul>
            </nav>
        </aside>
        <main>
            <div class="container">
                <h1 class="mb-4">問題一覧</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>問題</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $question) { ?>
                            <tr id="question-<?= $question["id"] ?>">
                                <td><?= $question["id"]; ?></td>
                                <td><?= $question["content"]; ?></td>
                                <form method="POST" action="../services/delete_question.php">
                                    <td>
                                        <input type="hidden" name="id" value="<?= $question["id"] ?>">

                                        <button type="submit">削除</button>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
