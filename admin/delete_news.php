<?php
    session_start();

    if($_SESSION['email'] == false){
        header("Location:./index.html");
        exit;
    }

    $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8'):'';

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=corporate_db","root","");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("DELETE FROM news WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    
    header('location:./news.php');
?>