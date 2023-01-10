<?php
     $name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
     $price = isset($_POST['price'])? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8') : '';
     $count = isset($_POST['count'])? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';

     session_start();

      //もし、sessionにproductsがあったら
   if(isset($_SESSION['products'])){  
    //$_SESSION['products']を$productsという変数にいれる
       $products = $_SESSION['products']; 
    //$productsをforeachで回し、キー(商品名)と値（金額・個数）取得
       foreach($products as $key => $product){  
        //もし、キーとPOSTで受け取った商品名が一致したら、
           if($key == $name){ 
            //既に商品がカートに入っているので、個数を足し算する     
               $count = (int)$count + (int)$product['count'];
           }
       }
   }  
     //配列に入れるには、$name,$count,$priceの値が取得できていることが前提なのでif文で空のデータを排除する
    if($name!=''&&$count!=''&&$price!=''){
        $_SESSION['products'][$name]=[
             'count' => $count,
             'price' => $price
         ];
    }

    $products = isset($_SESSION['products'])? $_SESSION['products']:[];

//     if(isset($products)){
//            foreach($products as $key => $product){
//                echo $key;      //商品名
//                echo "<br>";
//                echo $product['count'];  //商品の個数
//                echo "<br>";
//                echo $product['price']; //商品の金額
//                echo "<br>";
//            }
//        }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
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
                    <li class="item-topic"><a href="cart.php">MyCart</a></li>
                    <li class="item-cart"><a href="../main/info.html">Info</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="wrapper last-wrapper">
                <div class="container">
                    <div class="wrapper-title">
                        <h3>SHOP</h3>
                        <p>商品一覧</p>
                    </div>
                    <div class="itemlist">
                        <ul>
                            <li>
                                <img src="products/black-rucksuck003.jpg" alt="">
                                <div class="item-body">
                                    <h5>リュックサック(黒)</h5>
                                    <p>￥9999</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="リュックサック(黒)">
                                        <input type="hidden" name="price" value="9999">   
                                        <input type="text" value="1" name="count">
                                        <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                    </form>
                                </div><!--enditem-body-->
                            </li>
                            <li>
                                <img src="products/blue-rucksuck001.jpg" alt="">
                                <div class="item-body">
                                    <h5>リュックサック(青)</h5>
                                    <p>￥9999</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="リュックサック(青)">
                                        <input type="hidden" name="price" value="9999">   
                                        <input type="text" value="1" name="count">
                                        <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                    </form><!-- end item-form -->
                                </div><!--enditem-body-->
                            </li>
                            <li>
                                <img src="products/pink-shawl001.jpg" alt="">
                                <div class="item-body">
                                    <h5>ショルダーバッグ(ピンク)</h5>
                                    <p>￥4500</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="ショルダーバッグ(ピンク)">
                                        <input type="hidden" name="price" value="4500">  
                                        <input type="text" value="1" name="count"> 
                                        <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                    </form><!-- end item-form -->
                                </div><!--enditem-body-->
                            </li>
                            <li>
                                <img src="products/white-rucksuck001.jpg" alt="">
                                <div class="item-body">
                                    <h5>リュックサック(白)</h5>
                                    <p>￥9999</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="リュックサック(白)">
                                        <input type="hidden" name="price" value="9999">   
                                        <input type="text" value="1" name="count">
                                        <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                    </form><!-- end item-form -->
                                </div><!--enditem-body-->
                            </li>
                            <li>
                                <img src="products/brown-rucksuck001.jpg" alt="">
                                <div class="item-body">
                                    <h5>リュックサック(ブラウン)</h5>
                                    <p>￥5699</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="リュックサック(ブラウン)">
                                        <input type="hidden" name="price" value="5699"> 
                                        <input type="text" value="1" name="count">  
                                        <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                    </form><!-- end item-form -->
                                </div><!--enditem-body-->
                            </li>
                        </ul>
                    </div><!--enditemlist-->
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