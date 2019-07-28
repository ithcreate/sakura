<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="h2">何もしない人削除</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

        <?php

        try{

            $pro_code=$_POST['code'];
            $pro_gazou_name=$_POST['gazou_name'];

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql ='DELETE FROM mst_product WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$pro_code;
            $stmt->execute($data);

            $dbh=null;

            if($pro_gazou_name !='')
            {
                unlink('./gazou/'.$pro_gazou_name);
            }
        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>

        <p>削除しました。</p>
        <a class="btn btn-primary my-5" href="pro_list.php">戻る</a>

    </div>
</div>

<?php
require('../footer.php');
?>
