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

    // update
    $stmt = $dbh->prepare("UPDATE orders SET order_status = 1 WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();


    header('location:./orders.php');
?>