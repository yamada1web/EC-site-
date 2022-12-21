<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-wrapper" id="login">
        <div class="container">
            <div class="login">
                <div class="login-wrapper-title">
                    <h3>会員登録</h3>
                </div>
                <form class="login-form" action="register_output.php" method="POSt">
                    <div class="form-group">
                        <p>メールアドレス</p>
                        <input type="email" name="email" required value="<?php $email; ?>">
                    </div>
                    <div class="form-group">
                        <p>パスワード</p>
                        <input type="password" name="password" required value="<?php $password; ?>">
                    </div>
                    <button type="submit" class="btn btn-submit" onclick=>送信</button>
                    <br>
                    <br>
                    <a href="./index.html">ログイン</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>