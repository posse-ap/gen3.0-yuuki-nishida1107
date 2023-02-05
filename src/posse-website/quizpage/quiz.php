<?php
require('../../dbconnect.php');
shuffle($questions);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizPage</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="page-header">
        <div class="page-header-inner">
            <nav>
                <div class="heder-logo">
                    <img src="./assets-ph1-website/img/logo.svg" alt="posseロゴ">
                </div>
                <ul class="main-nav">
                    <li><a href="../toppage/index.html" class="p-header__nav__item__link">POSSEとは</a></li>
                    <li><a href="./quiz/" class="p-header__nav__item__link">クイズ</a></li>
                    <li><img src="./assets-ph1-website/img/icon/icon-twitter.svg" alt=""></li>
                    <li><img class="" src="./assets-ph1-website/img/icon/icon-instagram.svg" alt=""></li>
                </ul>

                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="keyVisual">
            <img class="main-image" src="./assets-ph1-website/img/quiz/bg-hero.jpg" alt="">
            <div class="keyVisual-content">
                <p class="lavel">posse課題</p>
                <p class="inline">ITクイズ</p>
            </div>
        </div>
        <article class="wrapper">
            <div class="js-wrapper">



                <?php foreach ($questions as $key => $question) { ?>
                    <div class="quetionone-logo">
                        <h1>Q<?= $key + 1 ?></h1>
                    </div>
                    <h1 class="quetionone-title" id="quetionone-titlejs"><?= $question["content"] ?></h1>
                    <div class="quetionone-figure">
                        <img class="quetionone-image" src=<?= $question["image"] ?>>
                    </div>
                    <div class="quetiononeAnswer">
                        <div class="quetiononeAnswer-logo">
                            <h1>A</h1>
                        </div>
                        <ul class="quetiononeAnswer-list wu">
                            <li><button class="js-answer"><?= $question["choices"][0]["name"] ?></button></li>
                            <li><button class="js-answer"><?= $question["choices"][1]["name"] ?></button></li>
                            <li><button class="js-answer"><?= $question["choices"][2]["name"] ?></button></li>
                        </ul>
                        <?php if(isset($question['supplement'])):?>
                            <div class="quetionone-quote"><h2><?=$question['supplement']?></h2></div>
                            <?php endif;?>
                    <?php } ?>


                    </div>
                    <div class="line-page">
                        <img class="line-image" src="./assets-ph1-website/img/bg-line.jpg" alt="">
                        <div class="line-inner">
                            <div class="line-title">
                                <div class="line-title-icon">
                                    <img src="./assets-ph1-website/img/icon/icon-line.svg" alt="">
                                </div>
                                <p class="line">POSSE公式LINE</p>
                            </div>
                            <p class="line-content">公式LINEにてご質問を随時受け付けております。
                                <br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので</br>
                                下記ボタンより友達追加をお願いします！
                            </p>
                            <div class="line-button">
                                <p class="line-button-content">LINE追加</p>
                            </div>
                        </div>
                    </div>
        </article>




        <div class="posse-line">
            <p class="lineimg"><img src="./assets-ph1-website/img/icon/icon-line.svg" alt=""></p>
            <i class="line-number">posse公式LINEで<br>最新情報をゲット！</i>
        </div>
        <div class="line-footer">
            <p>公式LINEで最新情報をGET!</p>
        </div>
    </main>
    <footer class="main-footer">
        <div class="footer-logo"><img src="./assets-ph1-website/img/logo.svg" alt=""></div>
        <p class="copyright">posse公式サイト</p>
        <ul class="footer-sns">
            <li><img src="./assets-ph1-website/img/icon/icon-twitter.svg" alt=""></li>
            <li><img src="./assets-ph1-website/img/icon/icon-instagram.svg" alt=""></li>
        </ul>
        <div class="footer-copyright"><small>&copy; 2022 POSSE</small></div>
    </footer>
    <script src="quiz.js"></script>
</body>

</html>
