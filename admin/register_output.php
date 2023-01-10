<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    $email = $_POST['email'];

    $pdo = new PDO(
        'mysql:host=localhost;dbname=yamadashu2_ecshop;charset=utf8',
        'yamadashu2_user2',
        'password2'
    );
    if (isset($_SESSION['users2'])) {
        $id = $_SESSION['users2']['id'];
        $sql = $pdo->prepare('select * from users2 where id!=? and password=?');
        $sql->execute([$id, $_REQUEST['password']]);
    } else {
        $sql = $pdo->prepare('select * from users2 where password=?');
        $sql->execute([$_REQUEST['password']]);
    }

    echo '<br>';
    $link_a_page = 'TODOへ';
    if (empty($sql->fetchAll())) {
        if (isset($_SESSION['users2'])) {
            // $sql = $pdo->prepare('update users set name=?, userid=?, ' .
            //     'password=? where id=?');
            $sql = $pdo->prepare('insert into users2 values(null,?,?)');
            $sql->execute([
                $_REQUEST['email'],
                $_REQUEST['password']
            ]);
            $_SESSION['users2'] = [
                'id' => $id, 
                'email' => $_REQUEST['email'], 'password' => $_REQUEST['password']
            ];
            $alert = "<script type='text/javascript'>alert('お客様情報を登録しました');</script>";
              echo $alert;
              setcookie('email', $email, (time() + 60 * 60 * 6), '/');
              header('Location: http://localhost/php/create/HP2/EC-site/main/');
        } else {
            $sql = $pdo->prepare('insert into users2 values(null,?,?)');
            $sql->execute([
                $_REQUEST['email'],
                $_REQUEST['password']
            ]);
            $alert = "<script type='text/javascript'>alert('お客様情報を登録しました');</script>";
              echo $alert;
              setcookie('email', $email, (time() + 60 * 60 * 6), '/');
              header('Location: http://localhost/php/create/HP2/EC-site/main/');
        }
    } else {
        echo 'ログイン名がすでに使用されていますので、変更してください。';
    }
    ?>
</body>

</html>
