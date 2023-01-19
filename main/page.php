<?php
    $id = isset($_GET['id'])? htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8'):'';

    // if($id==''){
    //     header('location:./index.php');
    // }

    //DB接続
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_corporatedb","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("SELECT * FROM news WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="../seedling-solid.svg">
    <title><?php echo $news[0]['title']; ?></title>
</head>
<body>
    <h1 class="title">Make memories of a lifetime with this bag</h1>
    <header class="page-header">
        <nav>
            <ul>
                <li class="current"><a href="index.php">ホーム</a></li>
                <li class="item-news"><a href="#">新着ニュース</a></li>
                <li class="item-login"><a href="../admin/index.html">ログイン</a></li>
                <li class="item-topic"><a href="../shop/shop.php">商品一覧</a></li>
                <li class="item-info"><a href="./info.html">Info</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="wrapper">
            <div class="container">
                <article>
                    <div class="page-title">
                        <h1><?php echo $news[0]['title']; ?></h1>
                        <p><?php echo $news[0]['updated_at']; ?></p>
                    </div>
                    <div class="page-text">
                        <?php echo $news[0]['content']?>
                    </div>
                </article>
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


