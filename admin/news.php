<?php
    // session_start();
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

    $stmt = $dbh->prepare("SELECT * FROM news");
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事管理</title>
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
                    <h1>記事管理</h1>
                </div>
                <button type="button" class="btn btn-blue" onclick="location.href='create_news.php'">投稿する</button>
                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>タイトル</th>
                                <th>本文</th>
                                <th>更新日時</th>
                                <th>作成日時</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($news as $new): ?>
                            <tr>
                                <td><?php echo $new['id'];?></td>
                                <td><?php echo $new['title'];?></td>
                                <td><?php echo $new['content'];?></td>
                                <td><?php echo $new['updated_at'];?></td>
                                <td><?php echo $new['created_at'];?></td>
                                <td>
                                    <button type="button" class="btn btn-green" onclick="location.href='edit_news.php?id=<?php echo $new['id']?>'">編集</button>
                                    <button type="button" class="btn btn-red delete" data-id=<?php echo $new['id']; ?>>削除</button>
                                    <form method="POST" action="delete_news.php" id="delete_form_<?php echo $new['id']; ?>">
                                        <input type="hidden" value="<?php echo $new['id']; ?>" name="id">
                                    </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(".delete").click(function(){
            var id = this.dataset.id;
            if(confirm("ID: "+id+"番の記事を本当に削除していいですか?")){
                //OKの場合
                $("#delete_form_"+id).submit();
            }else{
                //Noの場合
                return false;
            }
        })
    </script>
</body>
</html>