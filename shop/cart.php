<?php
    $delete_name = isset($_POST['delete_name'])? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';

    session_start();

    if($delete_name != '') unset($_SESSION['products'][$delete_name]);

    $total = 0;
    $products = isset($_SESSION['products'])? $_SESSION['products']:[];

    foreach($products as $name => $product){
            //各商品の小計を取得
            $subtotal = (int)$product['price']*(int)$product['count'];
            //各商品の小計を$totalに足す
            $total += $subtotal;
    }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート</title>
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
                    <h3>MY CART</h3>
                    <p>カート</p>
                </div>
                <div class="cartlist">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>個数</th>
                                <th>小計</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $name => $product): ?>
                            <tr>
                                <td label="商品名："><?php echo $name; ?></td>
                                <td label="価格：" class="text-right">¥<?php echo $product['price']; ?></td>
                                <td label="個数：" class="text-right"><?php echo $product['count']; ?></td>
                                <td label="小計：" class="text-right">¥<?php echo $product['price']*$product['count']; ?></td>
                                <td>
                                    <form action="cart.php" method="post">
                                        <input type="hidden" name="delete_name" value="<?php echo $name; ?>">
                                        <button type="submit" class="btn btn-red">削除</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="total">
                                <th colspan="3">合計</th>
                                <td colspan="2">¥<?php echo $total; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart-btn">
                    <button type="button" class="btn btn-blue" onclick="location.href='pay.php'" <?php if(empty($products)) echo 'disabled="disabled"'; ?>>購入手続きへ</button>
                    <button type="button" class="btn btn-gray" onclick="location.href='shop.php'">お買い物を続ける</button>
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