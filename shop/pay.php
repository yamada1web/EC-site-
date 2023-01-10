<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入手続き</title>
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
                        <h3>ご購入者情報</h3>
                    </div>
                    <form class="pay-form"  action="pay_conf.php" method="POST">
                        <div class="form-group">
                            <p class="form-title">お名前 *</p>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <p class="form-title">Email *</p>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <p class="form-title">電話番号 *</p>
                            <input type="tel" name="tel" required>
                        </div>
                        <div class="form-group">
                            <p class="form-title">お届け先 *</p>
                            <label>郵便番号</label><br>
                            <input type="text" name="postcode" required>
                            <label>住所</label><br>
                            <input type="text" name="address" required>
                        </div>
                        <button type="submit" class="btn btn-blue">決済情報を入力する</button>
                    </form>
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