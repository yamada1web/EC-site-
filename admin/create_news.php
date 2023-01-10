<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事投稿</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
    <script>
        window.onload = function() {
            var arr = getCookieArray();
            var result = arr["email"];
            if (result === "" || result === null || result === undefined) {
                window.location.href = "http://localhost/php/create/HP2/EC-site/admin/index.html";
            }
        }

        function getCookieArray() {
            var arr = new Array();
            if (document.cookie != '') {
                var tmp = document.cookie.split('; ');
                for (var i = 0; i < tmp.length; i++) {
                    var data = tmp[i].split('=');
                    arr[data[0]] = decodeURIComponent(data[1]);
                }
            }
            return arr;
        }
    </script>

    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="dashboard.php">管理画面</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="logout.php">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>新規作成</h3>
                </div>
                <form class="edit-form" method="post" action="store_news.php">
                    <div class="form-group">
                        <p>タイトル</p>
                        <input type="text" name="title" required>
                    </div>
                    <div class="from-group">
                        <p>本文</p>
                        <textarea name="content"></textarea>
                    </div>
                    <button type="subject" class="btn btn-blue">公開する</button>
                </form>
            </div>
        </div>
    </main>
    <footer id="footer">
        <section class="primary">
            <p class="logo"><a href="#">Life with bag</a></p>
            <p class="address">
                〒000-0000 東京都××区×××丁目<br>
                TEL : 111-222-3333 / FAX : 444-555-6666
            </p>
            <div class="nav-row">
                <ul class="navi">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Production</a></li>
                    <li><a href="#">information</a></li>
                </ul>
                <ul class="sns-navi"> 
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                </ul>
            </div>
        </section>
        <section class="secondary">
            <ul class="sitenavi">
                <li><a href="#">サイトマップ</a></li>
                <li><a href="#">プライバシーポリシー</a></li>
            </ul>
            <p class="copyright">this article is an example</p>
        </section>
    </footer>
</body>
</html>