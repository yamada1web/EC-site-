<?php
$user_id = $_POST['user_mail'];

unset($_SESSION['users']);
$pdo = new PDO(
    'mysql:host=localhost; dbname=users;charset=utf8;',
    'userhost',
    'passevent'
);

$sql = $pdo->prepare('select *from users where user_mail = ? and password');
$sql->execute([$_REQUEST['user_mail'],$_REQUEST['password']]);
foreach($sql as $row){
    $_SESSION['users'] = [
        'id' => $row['id'],
        'user_mail' => $row['user_mail'],
        'password' => $row['password'],
    ];
}
if(isset($_SESSION['users'])){
    setcookie('user_mail',$userMail,(time() + 60 * 60 *6),'/');
    header('Location: ');
}else{
    $alert = "<script type='text/javascript'>alert('ログイン名またはパスワードが違います。')</script>;";
    echo $alert;
    header("Location; ");
}