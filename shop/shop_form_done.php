<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>注文完了</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

        <?php

          try{

              require_once('../common/common.php');

              $post=sanitize($_POST);

              $onamae=$post['onamae'];
              $email=$post['email'];
              $postal1=$post['postal1'];
              $postal2=$post['postal2'];
              $address=$post['address'];
              $tel=$post['tel'];
              $chumon=$post['chumon'];
              $pass=$post['pass'];
              $danjo=$post['danjo'];
              $birth=$post['birth'];

              print '<p class="my-4">';
              print $onamae.'様<br>';
              print 'ご注文ありがとうございました。<br>';
              print $email.'にメールを送りましたのでご確認ください。<br>';
              print '詳細は以下の住所に発送させていただきます。<br>';
              print $postal1.'-'.$postal2.'<br>';
              print $address.'<br>';
              print $tel.'<br>';
              print '</p>';


              $honbun='';
              $honbun.=$onamae." 様 \n\n この度はご注文ありがとうございました。 \n";
              $honbun.="\n";
              $honbun.="ご注文商品 \n";
              $honbun.="--------------------------------------------------\n";
              $cart=$_SESSION['cart'];
              $kazu=$_SESSION['kazu'];
              $max=count($cart);
              require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

              for($i=0; $i<$max; $i++){
                  $sql = 'SELECT name,price FROM mst_product WHERE code = ?';
                  $stmt = $dbh->prepare($sql);
                  $data[0]=$cart[$i];
                  $stmt->execute($data);

                  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                  $name=$rec['name'];
                  $price=$rec['price'];
                  $kakaku[]=$price;
                  $suryo=$kazu[$i];
                  $shokei=$price * $suryo;

                  $honbun.=$name.'  ';
                  $honbun.=$price.'円 x ';
                  $honbun.=$suryo.'個 = ';
                  $honbun.=$shokei."円 \n";
              }

              $sql = 'LOCK TABLES dat_sales,dat_sales_product WRITE';
              $stmt = $dbh->prepare($sql);
              $stmt->execute();

              $lastmembercode=0;
              if($chumon=='chumontouroku'){
                  $sql = 'INSERT INTO dat_member(password,name,email,postal1,postal2,address,tel,danjo,born) VALUES (?,?,?,?,?,?,?,?,?)';
                  $stmt = $dbh->prepare($sql);
                  $data=array();
                  $data[]=md5($pass);
                  $data[]=$onamae;
                  $data[]=$email;
                  $data[]=$postal1;
                  $data[]=$postal2;
                  $data[]=$address;
                  $data[]=$tel;
                  if($danjo=='dan'){
                      $data[]=1;
                  }else{
                      $data[]=2;
                  }
                  $data[]=$birth;
                  $stmt->execute($data);
                  $sql = 'SELECT LAST_INSERT_ID()';
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute();
                  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                  $lastcode=$rec['LAST_INSERT_ID()'];
              }

              $sql = 'INSERT INTO dat_sales(code_member,name,email,postal1,postal2,address,tel) VALUES (?,?,?,?,?,?,?)';
              $stmt = $dbh->prepare($sql);
              $data=array();
              $data[]=$lastmembercode;
              $data[]=$onamae;
              $data[]=$email;
              $data[]=$postal1;
              $data[]=$postal2;
              $data[]=$address;
              $data[]=$tel;
              $stmt->execute($data);

              $sql = 'SELECT LAST_INSERT_ID()';
              $stmt = $dbh->prepare($sql);
              $stmt->execute();
              $rec = $stmt->fetch(PDO::FETCH_ASSOC);
              $lastcode=$rec['LAST_INSERT_ID()'];

              for($i=0;$i<$max;$i++){
                  $sql ='INSERT INTO dat_sales_product(code_sales,code_product,price,quantity) VALUES (?,?,?,?)';
                  $stmt = $dbh->prepare($sql);
                  $data=array();
                  $data[]=$lastcode;
                  $data[]=$cart[$i];
                  $data[]=$kakaku[$i];
                  $data[]=$kazu[$i];
                  $stmt->execute($data);
              }

              $sql = 'UNLOCK TABLES';
              $stmt = $dbh->prepare($sql);
              $stmt->execute();

              $dbh = null;

              if($chumon=='chumontouroku');{
                  print '<p class="my-4">';
                  print'会員登録が完了いたしました。<br>';
                  print'次回からメールアドレスとパスワードでログインしてください。<br>';
                  print'ご注文が簡単にできるようになります。<br>';
                  print'<br>';
                  print'</p>';
              }

              $honbun.=" 税込みとなっております。 \n";
              $honbun.="--------------------------------------------------\n";
              $honbun.="\n";
              $honbun.="代金は以下の口座にお振込ください。 \n";
              $honbun.="〇〇銀行や××支店普通口座1234567\n";
              $honbun.="入金確認が取れ次第、詳細をご連絡させていただきます。\n";
              $honbun.="\n";

              if($chumon=='chumontouroku');
              {
              $honbun.="会員登録が完了いたしました。\n";
              $honbun.="次回からメールアドレスとパスワードでログインしてください。\n";
              $honbun.="ご注文が簡単にできるようになります。\n";
              $honbun.="\n";
              }
              $honbun.="　　　　　　　　　　　　　\n";
              $honbun.="　〜何もしない興行〜\n";
              $honbun.="\n";
              $honbun.=" 東京都新宿区123-4\n";
              $honbun.=" 電話03-1234-5678\n";
              $honbun.="メール nanimosinaihito_kougyo@xmail.com\n";
              $honbun.="　　　　　　　　　　　　　\n";

              $title = '【何もしない人興行】ご注文ありがとうございます。';
              $header = 'From:nanimosinaihito_kougyo@xmail.com';
              $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
              mb_language('Japanese');
              mb_internal_encoding('UTF-8');
              mb_send_mail($email,$title,$honbun,$header);

              $title = 'お客様からご注文がありました。';
              $header = 'From: ' .$email;
              $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
              mb_language('Japanese');
              mb_internal_encoding('UTF-8');
              mb_send_mail('testinguesugi@gmail.com',$title,$honbun,$header);

          }catch(Exception $e){
              print'ただいま障害により大変ご迷惑をお掛けしております。';
          }

          ?>

        <div class="text-right">
            <a class="btn btn-primary px-4" href="shop_list.php">商品一覧画面へ</a>
        </div>

    </div>

</div>

<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true){
    setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>

<?php
require('../footer_m.php');
?>
