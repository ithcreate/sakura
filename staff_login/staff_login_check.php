<?php

try{

  $staff_code=$_POST['code'];
  $staff_pass=$_POST['pass'];

  $staff_code=htmlspecialchars($staff_code);
  $staff_pass=htmlspecialchars($staff_pass);

  $staff_pass=md5($staff_pass);

  require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

  $sql='SELECT name FROM mst_staff WHERE code=? AND password=?';
  $stmt=$dbh->prepare($sql);
  $data[]=$staff_code;
  $data[]=$staff_pass;
  $stmt->execute($data);

  $dbh=null;

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  ?>
<?php if($rec==false){ ?>

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

    </style>
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
            <p class="my-5">スタッフコードかパスワードが間違っています。</p>
            <a class="btn btn-primary my-4" href="staff_login.php">戻る</a>
        </div>

        <?php

      }else{
        session_start();
        $_SESSION['login']=1;
        $_SESSION['staff_code']=$staff_code;
        $_SESSION['staff_name']=$rec['name'];
        header('Location:staff_top.php');
  }

}catch (Exception $e){
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

        <?php
require('../footer.php');
?>
