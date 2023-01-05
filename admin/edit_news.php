<?php 
    // session_start();

    // if($_SESSION['email'] == false){
    //     header("Location:./index.html");
    //     exit;
    // }

    $id = isset($_GET['id'])? htmlspecialchars($_GET['id'],ENT_QUOTES, 'utf-8'):'';
    if($id == ''){
        header("Location:./news.php");
        exit;
    }

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=corporate_db","root","");
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
    <title>記事編集</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="dashboard.php">管理画面</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="logout.php">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>編集</h3>
                </div>
                <form class="edit-form" action="./update_news.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $news[0]['id']?>">
                    <div class="form-group">
                        <p>タイトル</p>
                        <input type="text" name="title" value="<?php echo $news[0]['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <p>本文</p>
                        <textarea name="content"><?php echo strip_tags($news[0]['content']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-blue">更新する</button>
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