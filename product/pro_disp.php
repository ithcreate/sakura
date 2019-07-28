<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>何もしない人<br class="d-inline-block d-sm-none">情報参照</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

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
                $disp_gazou='<img class="img-fluid" src="./gazou/'.$pro_gazou_name.'">';
            }

        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>

        <dl class="row">
            <dt class="col-auto">商品コード</dt>
            <dd class="col-auto"><?php print $pro_code; ?></dd>
        </dl>
        <dl class="row">
            <dt class="col-auto">商品名</dt>
            <dd class="col-auto"><?php print $pro_name; ?></dd>
        </dl>
        <dl class="row">
            <dt class="col-auto">商品説明</dt>
            <dd class="col-auto"><?php print $pro_description; ?></dd>
        </dl>
        <dl class="row">
            <dt class="col-auto">価格</dt>
            <dd class="col-auto"><?php print $pro_price; ?></dd>
        </dl>
        <dl class="row">
            <p class="mx-2"><?php print $disp_gazou; ?></p>
        </dl>

        <form>
            <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
        </form>
    </div>
</div>

<?php
require('../footer.php');
?>
