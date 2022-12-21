<?php session_start(); ?>
<?php
if (isset($_SESSION['users'])) {
	unset($_SESSION['users']);
	//echo 'ログアウトしました。';
	if (isset($_COOKIE['email'])) {
		//echo "<script type='text/javascript'>alert('" . $_COOKIE['user_id'] . "');</script>";
		setcookie('email', '', (time() - 3600), '/');
	} 
	header('Location: http://localhost/php/create/HP2/EC-site/admin/index.html');
} else {
	//echo 'すでにログアウトしています。';
	header('Location: http://localhost/php/create/HP2/EC-site/admin/index.html');
}
?>
