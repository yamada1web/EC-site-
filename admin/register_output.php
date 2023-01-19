<?php
     $name = isset($_POST['name'])? htmlspecialchars($_POST['name'],ENT_QUOTES,'utf-8'):'';
     $email = isset($_POST['email'])? htmlspecialchars($_POST['email'],ENT_QUOTES,'utf-8'):'';
     $password = isset($_POST['password'])? htmlspecialchars($_POST['password'],ENT_QUOTES,'utf-8'):'';
     $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';

     //DB接続
       try{
               $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_ecshop","yamadashu2_user2","password2");
           }catch(PDOException $e){
               var_dump($e->getMessage());
               exit;
        }
    
           $stmt = $dbh->prepare("INSERT INTO users2(name,email,password,address,created_at,updated_at) VALUES(:name,:email,:password,:address,now(),now())");
           $stmt->bindParam(":name",$name);
           $stmt->bindParam(":email",$email);
           $stmt->bindParam(":password",$password);
           $stmt->bindParam(":address",$address);
           $stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main>
        <!-- contact　conf -->
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="thanks">
                    <h3>登録完了しました。</h3>
                    <p>ご登録ありがとうございました。</p>
                    <button type="button" class="btn btn-gray" onclick="location.href='../main/index.php'">トップページに戻る</button>
                </div>
            </div>
        </div>
        <!-- end contact conf-->
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