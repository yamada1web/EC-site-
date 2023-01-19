<?php
    session_start();

    // if($_SESSION['email'] == false){
    //     header("Location:./index.html");
    //     exit;
    // }

    $id = isset($_GET['id'])? htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8'):'';

    if($id == ''){
        header('location:./orders.php');
    }

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_corporatedb","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    //orders
    $stmt1 = $dbh->prepare("SELECT * FROM orders WHERE id=:id");
    $stmt1->bindParam(':id',$id);
    $stmt1->execute();
    $orders = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    //orders_products
    $stmt2 = $dbh->prepare("SELECT * FROM order_products WHERE order_id=:id");
    $stmt2->bindParam(':id',$id);
    $stmt2->execute();
    $order_products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受注詳細</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="dashboard.php">管理画面</a></h1>
            </div>

            <div class="menu-right menu">
                <a href="logout.php">ログアウト</a>
            </div>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>受注詳細</h3>
                </div>
                <div class="list">
                    <h4>購入者情報</h4>
                    <table>
                       <tbody>
                            <tr>
                                <th>氏名</th><td><?php echo $orders[0]['name']; ?></td>
                            </tr>
                            <tr>
                                <th>郵便番号</th><td><?php echo $orders[0]['postcode']; ?></td>
                            </tr>
                            <tr>
                                <th>住所</th><td><?php echo $orders[0]['address']; ?></td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th><td><?php echo $orders[0]['email']; ?></td>
                            </tr>
                            <tr>
                                <th>電話番号</th><td><?php echo $orders[0]['tel']; ?></td>
                            </tr>
                            <tr>
                                <th>合計金額</th><td><?php echo $orders[0]['total']; ?></td>
                            </tr>
                            <tr>
                                <th>受注日時</th><td><?php echo $orders[0]['created_at']; ?></td>
                            </tr>
                            <tr>
                                <th>更新日時</th><td><?php echo $orders[0]['updated_at']; ?></td>
                            </tr>
                            <tr>
                                <th>注文状況</th>
                                <td><?php if($orders[0]['order_status'] == 0): ?>
                                        <button type="button" class="btn btn-red">受付中</button>
                                        <button type="button" class="btn btn-blue" onclick="location.href='update_order_status.php?id=<?php echo $id; ?>'">発送済み</button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-blue">発送済み</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                       </tbody>
                    </table>

                    <h4>商品詳細</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>注文ID</th>
                                <th>商品名</th>
                                <th>個数</th>
                                <th>金額</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_products as $order_product): ?>
                            <tr>
                                <td><?php echo $order_product['id']; ?></td>
                                <td><?php echo $order_product['order_id']; ?></td>
                                <td><?php echo $order_product['product_name']; ?></td>
                                <td><?php echo $order_product['num']; ?></td>
                                <td><?php echo $order_product['price']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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