<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>商品詳細</h1>
</div>

<div class="row justify-content-center">

    <div class="col-sm-5">

        <?php

        try{

          $pro_code = $_GET['procode'];

          require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

          $sql='SELECT name,description,price,gazou FROM mst_product WHERE code=?';
          $stmt=$dbh->prepare($sql);
          $data[]=$pro_code;
          $stmt->execute($data);

          $rec=$stmt->fetch(PDO::FETCH_ASSOC);
          $pro_name=$rec['name'];
          $pro_description=$rec['description'];
          $pro_price=$rec['price'];
          $pro_gazou_name=$rec['gazou'];

          $dbh=null;

          if($pro_gazou_name==''){
              $disp_gazou='';
          }else{
              $disp_gazou='<img class="img-fluid" src="/sakura/product/gazou/'.$pro_gazou_name.'">';
          }
          print $disp_gazou;
        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
        }

        ?>

        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row" style="width:25%">商品コード</th>
                    <td><?php print $pro_code; ?></td>
                </tr>
                <tr>
                    <th scope="row">商品名</th>
                    <td><?php print $pro_name; ?></td>
                </tr>
                <tr>
                    <th scope="row">商品説明</th>
                    <td><?php print $pro_description; ?></td>
                </tr>
                <tr>
                    <th scope="row">価格</th>
                    <td><?php print number_format($pro_price); ?>円(税込)</td>
                </tr>
            </tbody>
        </table>

        <form class="d-inline-block float-left">
            <button class="btn btn-primary" type="button" onclick="history.back()">戻る</button>
        </form>
        <?php print '<p class="text-right clearfix"><a class="btn btn-warning text-white text-decoration-none d-inline-block rounded-pill px-4" href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a></p>'; ?>

    </div>

</div>

<?php
require('../footer_m.php');
?>
