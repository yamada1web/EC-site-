<?php
    session_start();

    // if($_SESSION['email'] == false){
    //     header("Location:./index.html");
    //     exit;
    // }
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_corporatedb","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("SELECT * FROM orders");
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受注管理</title>
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
                    <h3>受注管理</h3>
                </div>
                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>氏名</th>
                                <th>電話番号</th>
                                <th>合計金額</th>
                                <th>注文日時</th>
                                <th>更新日時</th>
                                <th>注文ステータス</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['name']; ?></td>
                                <td><?php echo $order['tel']; ?></td>
                                <td><?php echo $order['total']; ?></td>
                                <td><?php echo $order['created_at']; ?></td>
                                <td><?php echo $order['updated_at']; ?></td>
                                <td>
                                    <?php if($order['order_status'] == 0):?>
                                        <button type="button" class="btn btn-red">受付中</button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-blue">発送済み</button>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-green" onclick="location.href='order_products.php?id=<?php echo $order['id']; ?>'">詳細</button>
                                </td>
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