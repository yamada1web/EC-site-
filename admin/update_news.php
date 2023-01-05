<?php 
    // session_start();

    // if($_SESSION['email'] == false){
    //     header("Location:./index.html");
    //     exit;
    // }

    $id = isset($_POST['id'])? htmlspecialchars($_POST['id'],ENT_QUOTES, 'utf-8'):'';
    $title = isset($_POST['title'])? htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8'):'';
    $content = isset($_POST['content'])? htmlspecialchars($_POST['content'], ENT_QUOTES, 'utf-8'):'';
    $content = nl2br($content);

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=corporate_db","root","");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("UPDATE news SET title=:title,content=:content, updated_at=now() WHERE id=:id");
    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":content",$content);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    header('location:./news.php');
?>