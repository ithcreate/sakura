<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>ログイン</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

      try{
        require_once('../common/common.php');

        $post=sanitize($_POST);
        $member_email=$post['email'];
        $member_pass=$post['pass'];

        $member_pass=md5($member_pass);

        require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

        $sql='SELECT * FROM dat_member WHERE email=? AND password=?';
        $stmt=$dbh->prepare($sql);
        $data[]=$member_email;
        $data[]=$member_pass;
        $stmt->execute($data);

        $dbh=null;

        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        //print $rec;
        if($rec==false){
            print'<p class="mb-5 py-5">メールアドレスかパスワードが間違っています。</p>';
            print'<p class="text-right"><a class="btn btn-primary rounded-pill d-inline-block px-4" href="member_login.php">戻る</a></p>';
        }else{

        session_start();
        $_SESSION['member_login']=1;
        $_SESSION['member_code']=$rec['code'];
        $_SESSION['member_name']=$rec['name'];
        print '<p class="my-5">ログイン完了</p>';
        print '<a class="btn btn-primary px-4" href="shop_list.php">商品一覧画面へ</a>';
        header('Location:shop_list.php');
        }

      }catch (Exception $e){
          print'<p>ただいま障害により大変ご迷惑をお掛けしております。</p>';
      }

      ?>

    </div>

</div>

<?php
require('../footer_m.php');
?>
