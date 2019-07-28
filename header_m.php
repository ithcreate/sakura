<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p&amp;subset=japanese" rel="stylesheet">
    <style>
        body {
            font-family: 'M PLUS 1p', sans-serif !important;
        }

        .jumbotron {

            background: url(../img/top-bg.jpg) 0 0 no-repeat;
            background-size: cover;
        }

    </style>
</head>
</style>
<title>何もしない人興行</title>
</head>

<body>

    <?php if(isset($_SESSION['member_login'])==false){ ?>

    <nav class="navbar navbar-expand-md p-3 px-md-4 mb-3 border-bottom box-shadow navbar-light sticky-top bg-white">
        <a class="navbar-brand text-decoration-none text-dark" href="/sakura/shop/shop_list.php">何もしない人興行</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item align-self-center mr-0 mr-sm-3 my-3 my-sm-0">
                    <a class="text-dark text-decoration-none" href="/sakura/shop/shop_list.php">商品一覧</a>
                </li>
                <li class="nav-item align-self-center mr-0 mr-sm-3 my-3 my-sm-0">
                    <a class="p-2 text-decoration-none bg-warning rounded-pill text-white px-4" href="/sakura/shop/shop_cartlook.php">カート</a>
                </li>
                <li class="nav-item align-self-center my-3 my-sm-0">
                    <a class="btn btn-primary" href="/sakura/shop/member_login.php">ログイン</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="col text-right my-2">
            <span>ようこそゲストさん<br><a class="text-decoration-none" href="/sakura/shop/member_login.php">ログイン画面</a></span>
        </div>

        <?php }else{ ?>

        <nav class="navbar navbar-expand-md p-3 px-md-4 mb-3 border-bottom box-shadow navbar-light sticky-top bg-white">
            <a class="navbar-brand text-decoration-none text-dark" href="/sakura/shop/shop_list.php">何もしない人興行</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item align-self-center mr-0 mr-sm-3 my-3 my-sm-0">
                        <a class="text-dark text-decoration-none" href="/sakura/shop/shop_list.php">商品一覧</a>
                    </li>
                    <li class="nav-item align-self-center mr-0 mr-sm-3 my-3 my-sm-0">
                        <a class="p-2 text-decoration-none bg-warning rounded-pill text-white px-4" href="/sakura/shop/shop_cartlook.php">カート</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="btn btn-outline-primary" href="/sakura/shop/member_logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <div class="col text-right my-2">

                <span><?php echo $_SESSION['member_name']; ?>さんログイン中</span>
            </div>

            <?php } ?>
