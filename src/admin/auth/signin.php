<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>POSSE 管理画面ダッシュボード</title>
  <link rel="stylesheet" href="../../admin/admin.css">

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
  <!-- header -->
  <?php include(dirname(__FILE__) . '/../../components/admin/header.php') ?>
  <main>
    <!-- login -->
    <form method="POST" action="../../services/signin.php" class="">
      <h2 class="text-4xl font-bold">ログイン</h2>
      <div class="mt-8">
        <dl>
          <dt><label>Email</label></dt>
          <dd><input class="" type="email" name="email" id="js-email" placeholder="メールアドレスを入力" required/></dd>
          <dt class=""><label>パスワード</label></dt>
          <dd class=""><input class="" type="password" name="password" id="js-password" placeholder="パスワードを入力" required/></dd>
        </dl>
        <button class="" type="submit" id="js-button">ログイン</button>
      </div>
    </form>
    </div>
  </main>
</body>

</html>
