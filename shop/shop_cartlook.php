<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>カートの中身</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

        <?php

        try{

          if(isset($_SESSION['cart'])==true){
              $cart = $_SESSION['cart'];
              $kazu = $_SESSION['kazu'];
              $max=count($cart);
          }else{
              $max=0;
          }

          if($max==0){
              print '<p class="text-center">カートに商品が入っていません。</p>';
              print '<p class="text-center">商品一覧から商品をお選びください</p>';
              print '<div class="mt-5 text-center"><a class="btn btn-primary" href="shop_list.php">商品一覧に戻る</a></div>';
          }else{

              require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

              foreach($cart as $key => $val){
                  $sql = 'SELECT code,name,description,price,gazou FROM mst_product WHERE code = ?';
                  $stmt = $dbh->prepare($sql);
                  $data[0]=$val;
                  $stmt->execute($data);

                  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                  $pro_name[]=$rec['name'];
                  $pro_description[]=$rec['description'];
                  $pro_price[]=$rec['price'];
                  if($rec['gazou']==''){
                      $pro_gazou[]='';
                  }else{
                      $pro_gazou[]='<img class="img-fluid" src="/sakura/product/gazou/'.$rec['gazou'].'">';
                  }
              }
              $dbh = null;
            }
        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
        }


        ?>

        <?php if($max!=0){ ?>
        <div class="text-right">
            <a class="text-decoration-none" href="clear_cart.php">カートを空にする</a>
        </div>
        <form method="post" action="kazu_change.php">
            <table class="table table-responsive text-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th style="width:15%">商品</th>
                        <th style="width:25%">商品画像</th>
                        <th style="width:20%">商品詳細</th>
                        <th style="width:10%">価格(税込)</th>
                        <th style="width:10%">日数</th>
                        <th style="width:10%">小計(税込)</th>
                        <th style="width:15%">削除</th>
                    </tr>
                </thead>
                <tbody>

                    <?php for($i=0;$i<$max;$i++){ ?>
                    <tr>
                        <td><?php	print $pro_name[$i]; ?></td>
                        <td><?php	print $pro_gazou[$i]; ?></td>
                        <td class="text-wrap"><?php	print $pro_description[$i]; ?></td>
                        <td class="text-right"><?php	print number_format($pro_price[$i]); ?> 円</td>
                        <td><input class="form-control" type="text" name="kazu<?php	print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
                        <td class="text-right"><?php print number_format($pro_price[$i] * $kazu[$i]); ?>円</td>
                        <td><input class="from-control" type="checkbox" name="sakujo<?php print $i; ?>"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <input type="hidden" name="max" value="<?php print $max; ?>">
            <div class="row">
                <div class="col-12 col-sm-5 text-center my-2">
                    <button class="col-5 btn btn-outline-primary" type="button" onclick="history.back()">戻る</button>
                    <button class="col-6 btn btn-primary" type="submit">数量変更</button>
                </div>
                <div class="col-12 col-sm-7 my-2">
                    <?php
                        if(isset($_SESSION["member_login"])==true)
                        {
                            print'<a class="col-12 col-sm-5 btn btn-outline-warning px-5 rounded-pill" href="shop_form.php">新規ご購入に進む</a>';
                            print'<a class="mt-2 mt-sm-0 ml-sm-2 col-12 col-sm-6 btn btn-warning px-5 rounded-pill text-white" href="shop_kantan_check.php">会員かんたん注文へ進む</a>';
                        }else{
                            print'<a class="col-12 col-sm-5 btn btn-warning px-5 rounded-pill text-white" href="shop_form.php">新規ご購入に進む</a>';
                            print'<a class="mt-2 mt-sm-0 ml-sm-2 col-12 col-sm-6 disabled btn btn-warning px-5 rounded-pill text-white" href="shop_kantan_check.php">会員かんたん注文へ進む</a>';
                        }
                        ?>
                </div>
            </div>
        </form>

        <?php } ?>
    </div>

</div>

<?php
require('../footer_m.php');
?>
