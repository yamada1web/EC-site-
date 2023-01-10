<?php
    // 値の受け取り
    $name = isset($_POST['name'])? htmlspecialchars($_POST['name'],ENT_QUOTES,'utf-8'):'';
    $email = isset($_POST['email'])? htmlspecialchars($_POST['email'],ENT_QUOTES,'utf-8'):'';
    $tel = isset($_POST['tel'])? htmlspecialchars($_POST['tel'],ENT_QUOTES,'utf-8'):'';
    $postcode = isset($_POST['postcode'])? htmlspecialchars($_POST['postcode'],ENT_QUOTES,'utf-8'):'';
    $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';

    session_start();
    $products = isset($_SESSION['products'])? $_SESSION['products']:[];
    $total = 0;
    foreach($products as $key => $product){
        $subtotal = (int)$product['price']*(int)$product['count'];
        $total += $subtotal;
    }

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_corporatedb","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    //テーブル
    $stmt1 = $dbh->prepare("INSERT INTO orders(name,email,tel,postcode,address,total,created_at,updated_at) VALUES(:name,:email,:tel,:postcode,:address,:total,now(),now())");
    $stmt1->bindParam(':name',$name);
    $stmt1->bindParam(':email',$email);
    $stmt1->bindParam(':tel',$tel);
    $stmt1->bindParam(':postcode',$postcode);
    $stmt1->bindParam(':address',$address);
    $stmt1->bindParam(':total',$total);
    $stmt1->execute();

    $order_id = $dbh->lastInsertId();

    foreach($products as $key => $product){
        $stmt2 = $dbh->prepare("INSERT INTO order_products(order_id,product_name,num,price) VALUES(:order_id,:product_name,:num,:price)");
        $stmt2->bindParam(':order_id',$order_id);
        $stmt2->bindParam(':product_name',$key);
        $stmt2->bindParam(':num',$product['count']);
        $stmt2->bindParam(':price',$product['price']);
        $stmt2->execute();
    }

    unset($_SESSION['products']);
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入完了</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="icon" href="cart-shopping-solid.svg">
 </head>
 <body>
 <h1 class="title">Make memories of a lifetime with this bag</h1>
        <header class="back">
            <nav>
                <ul>
                    <li class="current"><a href="../main/index.php">ホーム</a></li>
                    <li class="item-news"><a href="../main/page.php">新着ニュース</a></li>
                    <li class="item-login"><a href="../admin/index.html">ログイン</a></li>
                    <li class="item-topic"><a href="shop.php">商品一覧</a></li>
                    <li class="item-cart"><a href="../main/info.html">Info</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="wrapper last-wrapper">
                <div class="container">
                    <div class="wrapper-title">
                        <h3>購入完了</h3>
                    </div>
                    <div class="wrapper-body">
                        <div class="thanks">
                            <h4>ご購入ありがとうございました。</h4>
                        </div>
                        <button type="button" class="btn btn-gray" onclick="location.href='../main/index.php'">トップページに戻る</button>
                    </div>
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