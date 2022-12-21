<?php session_start(); ?>
<?php

$email = $_POST['email'];

unset($_SESSION['users2']);
$pdo = new PDO(
	'mysql:host=localhost;dbname=users2',
	'user2',
	'password'
);
$sql = $pdo->prepare('select * from users2 where email=? and password=?');
$sql->execute([$_REQUEST['email'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['users2'] = [
		'id' => $row['id'],
		'email' => $row['email'],
		'password' => $row['password'],
	];
}
if (isset($_SESSION['users2'])) {
	// echo 'いらっしゃいませ、', $_SESSION['users']['name'], 'さん。';
	setcookie('email', $email, (time() + 60 * 60 * 6), '/');

	header('Location: http://localhost/php/create/HP2/EC-site/admin/dashboard.php');
} else {
	$alert = "<script type='text/javascript'>alert('ログイン名またはパスワードが違います。');</script>";
	echo $alert;
	header('Location: http://localhost/php/create/HP2/EC-site/admin/index.html');
}

?>