<?php

    session_start();

    // if($_SESSION['admin_login'] == false){
    //     header("Location:./index.html");
    //     exit
    // }

    try{
        $dbh = new PDO("mysql:host=localhost; dbname=yamadashu2_ecshop","yamadashu2_user2","password2");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("SELECT * FROM users2");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $fp = fopen('./users.csv','w');

    fwrite($fp, "\xEF\xBB\xBF");

    $header = ['ID','名前','メールアドレス','パスワード','住所','登録日','更新日時'];
    fputcsv($fp,$header);

    foreach($users as $user){
        fputcsv($fp,$user);
    }

    fclose($fp);

    //会員登録画面を開いたまま、ダウンロード
    header('Location:./users.csv');
?>

