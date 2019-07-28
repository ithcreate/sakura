<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>カート追加完了</h1>
</div>

<div class="row justify-content-center">

    <div class="col-sm-4">

        <?php

      try{
        $pro_code = $_GET['procode'];

        if(isset($_SESSION['cart'])==true){
            $cart=$_SESSION['cart'];
            $kazu=$_SESSION['kazu'];
            if(in_array($pro_code,$cart)==true){
                print '<p class="text-center">この商品はすでにカートに入っています。</p>';
                print '<p class="text-center">カートをご確認ください</p>';
            }else{
                $cart[] = $pro_code;
                $kazu[] = 1;
                $_SESSION['cart'] = $cart;
                $_SESSION['kazu'] = $kazu;
                print '<p class="text-center">カートに追加しました。</p>';
            }
        }else{
            $cart[] = $pro_code;
            $kazu[] = 1;
            $_SESSION['cart'] = $cart;
            $_SESSION['kazu'] = $kazu;
            print '<p class="text-center">カートに追加しました。</p>';
        }
        print '<div class="mt-5">';
        print '<div class="float-left"><a class="btn btn-primary" href="shop_list.php">商品一覧に戻る</a></div>';
        print '<div class="text-right clearfix"><a class="btn btn-warning text-white text-decoration-none px-4" href="shop_cartlook.php">カートを見る</a></div>';
        print'</div>';
          
      }catch(Exception $e){
          print'ただいま障害により大変ご迷惑をお掛けしております。';
      }

      ?>

    </div>

</div>

<?php
require('../footer_m.php');
?>
