<?php
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_corporatedb","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("SELECT * FROM news ORDER BY id DESC LIMIT 5");
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life with bag</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="../seedling-solid.svg">
    <link rel="stylesheet" href="home.css">
</head>
<body>
        <!-- Loading -->
        <!-- <div id="loading-wrapper">
            <div class="loader"></div><br><br>
            <p>Loading…</p>
        </div> -->

        <!-- main title header -->
        <h1 class="title">Make memories of a lifetime with this bag</h1>
        <header class="back">
            <nav>
                <ul>
                    <li class="current"><a href="#">ホーム</a></li>
                    <li class="item-news"><a href="./page.php">新着ニュース</a></li>
                    <li class="item-login"><a href="../admin/index.html">ログイン</a></li>
                    <li class="item-topic"><a href="../shop/shop.php">商品一覧</a></li>
                    <li class="item-cart"><a href="info.html">Info</a></li>
                </ul>
            </nav>
        </header>

        <!-- contents -->
        <section class="contents">
            <h1 class="column">日常を彩るためのバッグが勢ぞろい</h1>
            <p class="text">ここではあなたの生活に必要な機能と多種多様なデザインのバッグをそろえています。</p><br>
            <div class="product1">
                <a href="#" id="black01"><img src="blackbag001.jpg" alt="リンク先のページへ" width="300px" height="350px"></a>
                <a href="#" id="black01_tx"><p>Black bag for School</p></a>
            </div>
            <div class="product1">
                <a href="#" id="hand01"><img src="handbag001.jpg" alt="リンク先のページへ" width="300px" height="350px"></a>
                <a href="#" id="hand01_tx"><p>Hand bag for job</p></a>
            </div>
            <div class="product1">
                <a href="#" id="hand02"><img src="handbag002.jpg" alt="リンク先のページへ" width="300px" height="350px"></a>
                <a href="#" id="hand02_tx"><p>Hand bag for Shopping</p></a>
            </div>
            <div class="product1">
                <a href="#" id="black02"><img src="blackbag002.jpg" alt="リンク先のページへ" width="300px" height="350px"></a>
                <a href="#" id="black02_tx"><p>Black bag for Visiting</p></a>
            </div>
        </section>        
        <br>

        <!-- 新着ニュース -->
        <section class="news">
            <div class="wrapper-title">
                <h1 class="column">新着情報</h1>
                <p class="text">お知らせ</p>
            </div>
            <div class="news-list">
                <?php foreach($news as $new): ?>
                    <ul>
                        <li><a href="page.php?id=<?php echo $new['id']; ?>"><?php echo $new['updated_at']; ?><?php echo $new['title']; ?></a></li>
                    </ul>
                    <?php endforeach; ?>
            </div>
        </section>

        <!--     p問い合わせフォーム     -->
        <section class="message">
            <div class="">
                
            </div>
        </section>

        

        <!-- footer -->
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