<?php 
    
    session_start();

    // if($_SESSION['email'] == false){
    //     header("Location:./index.html");
    //     exit;
    // }

    $name = isset($_GET['name'])? htmlspecialchars($_GET['name'], ENT_QUOTES, 'utf-8'):'';

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_ecshop","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }


    //ページの設定
    $rows = 10;
    $page = isset($_GET['page'])? $_GET['page']: 1;
    $offset = $rows * ($page-1);

    if($name == ''){
        $all_rows = $dbh->query("SELECT COUNT(*) FROM users2")->fetchColumn();
    }else{
        $all_rows_stmt = $dbh->prepare("SELECT * FROM users2 WHERE name like :name");
        $all_rows_stmt->bindValue(":name",'%'.$name.'%');
        $all_rows_stmt->execute();
        $all_rows = $all_rows_stmt->rowCount();
    }

    if(($all_rows % $rows) <= 0){
        $pages = (int)($all_rows/$rows);
    }else{
        $pages = (int)($all_rows/$rows)+1;
    }

    $next = ($page+1 > $pages)? '' : $page+1;

    $prev = ($page-1 <= 0)? '' : $page-1;

    if($name == ''){
        $stmt = $dbh->prepare("SELECT * FROM users2 limit :offset,:rows");
    }else{
        // $stmt = $dbh->prepare("SELECT * FROM users2 WHERE name=:name");
        // $stmt->bindParam(":name",$name);
        $stmt = $dbh->prepare("SELECT * FROM users2 WHERE name like :name limit :offset,:rows");
        $stmt->bindValue(":name",'%'.$name.'%');
    }

    // $stmt = $dbh->prepare("SELECT * FROM users2");
    $stmt->bindParam(":offset",$offset,PDO::PARAM_INT);
    $stmt->bindParam(":rows",$rows,PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員管理</title>
    <link rel="stylesheet" href="styles.css">
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
                <div class="wrapper-title">
                    <h3>会員管理</h3>
                </div>

                <button type="button" class="btn btn-gray" onclick="location.href='download.php'">CSV出力</button>
                <form class="serch" action="users.php" method="GET">
                    <input type="text" name="name" placeholder="名前検索">
                    <button type="submit" class="btn btn-blue">検索</button>
                </form>

                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-green">編集</button>
                                    <button type="button" class="btn btn-red">削除</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <ul class="paging">
                        <li><a href="./users.php?name=<?php echo $name; ?>"><< 最初</a></li>
                        <?php if($prev != ''): ?>
                            <li><a href="./users.php?page=<?php echo $prev; ?>&name=<?php echo $name; ?>"><?php echo $page-1; ?></a></li>
                        <?php endif; ?>
                        <li><span><?php echo $page; ?></span></li>
                        <?php if($next != ''): ?>
                            <li><a href="./users.php?page=<?php echo $next; ?>&name=<?php echo $name; ?>"><?php echo $page+1; ?></a></li>
                        <?php endif; ?>
                        <li><a href="./users.php?page=<?php echo $pages; ?>&name=<?php echo $name; ?>">最後 >></a></li>
                    </ul>
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