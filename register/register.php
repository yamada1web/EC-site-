<?php

$mail = $_POST['mail'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$dsn = "mysql:localhost; dbname:xxx; charset=utf8";
$username = "xxxx";
$password = "xxxxx";

try{
    $dbh = new PDO($dsn,$username,$password);
} catch(PDOException $e){
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt = bindValue(':mail',$sql);
$stmt->execute();
$member = $stmt->fetch();
if($member['mail'] === $mail){
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="signup.php">戻る</a>';
}else{
    //登録されていなければinsert
    $sql = "INSERT INTO users(mail,password) VALUES(:mail,:password)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail',$mail);
    $stmt->bindValue(':password',$password);
    $stmt->execute();
    $msg = '会員登録が完了しました。';
    $link = '<a href="login.php">ログインページ</a>';
}

?>

<h1><?php echo $msg?></h1>
<?php echo $link;?>
