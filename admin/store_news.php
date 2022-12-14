<?php 
    // session_start();
    // if($_SESSION['email'] == false){
    //     header("Location:./index.html");
    //     exit;
    // }

    $title = isset($_POST['title'])? htmlspecialchars($_POST['title'], ENT_QUOTES,'utf-8'):'';
    $content = isset($_POST['content'])? htmlspecialchars($_POST['content'], ENT_QUOTES, 'utf-8'):'';
    $content = nl2br($content);

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=yamadashu2_corporatedb","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("INSERT INTO news(
        title,
        content,
        created_at,
        updated_at
    )values(
        :title,
        :content,
        now(),
        now()
    )");
    $stmt->bindParam(':title',$title); //:titleという変数に$titleをバインド
    $stmt->bindParam(':content',$content); //:contentという変数に$contentをバインド
    $stmt->execute(); //stmtを実行

    header('location:./news.php');
?>

