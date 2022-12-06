<?php
    session_start();
    if($_SESSION['admin_login'] == false){
        header("Location:./index.html");
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ダッシュボード</title>
    <link rel="icon" href="../newspaper-solid.svg">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="dashboard.php">管理画面</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="index.html">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <h1>ダッシュボード</h1>
            </div>
            <div class="boxs">
                <a href="news.php" class="box">
                    <i class="far fa-newspaper icon"></i>
                    <p>記事管理</p>
                </a>
            </div>
        </div>
    </main>

    <footer id="footer">
        <section class="primary">
            <p class="logo"><a href="#">Life with bag</a></p>
            <p class="address">
                〒000-0000 東京都××区×××丁目<br>
                TEL : 111-222-3333 / FAX : 444-555-6666
            </p>
            <div class="nav-row">
                <ul class="navi">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Production</a></li>
                    <li><a href="#">information</a></li>
                </ul>
                <ul class="sns-navi"> 
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                </ul>
            </div>
        </section>
        <section class="secondary">
            <ul class="sitenavi">
                <li><a href="#">サイトマップ</a></li>
                <li><a href="#">プライバシーポリシー</a></li>
            </ul>
            <p class="copyright">this article is an example</p>
        </section>
    </footer>
</body>
</html>