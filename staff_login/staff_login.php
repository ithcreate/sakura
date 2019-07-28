<DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <title>何もしない人興行管理画面</title>
    </head>

    <body>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <nav class="navbar navbar-expand-md p-3 px-md-4 mb-3 border-bottom box-shadow navbar-light sticky-top bg-white">
            <a class="navbar-brand text-decoration-none text-dark" href="/sakura/staff_login/staff_top.php">何もしない人興行管理画面</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item align-self-center mr-0 mr-sm-3 my-3 my-sm-0">
                        <a class="btn btn-outline-primary" href="/sakura/shop/shop_list.php">ショップに戻る</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1>ログイン画面</h1>
                <p class="small">ログインID・パスワードをご入力ください。</p>
            </div>

            <div class="row justify-content-center">

                <div class="col-sm-5">
                    <form method="post" action="staff_login_check.php">
                        <div class="form-group">
                            <label for="code">スタッフコード</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="pass">パスワード</label>
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="">
                        </div>
                        <p class="small">※ログインID：1　パスワード：123　でログインできます</p>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary px-3">ログイン</button>
                        </div>
                    </form>

                </div>

            </div>

            <?php
require('../footer.php');
?>
