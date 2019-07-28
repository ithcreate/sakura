<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="h2">何もしない人修正</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        try{

            $pro_code=$_POST['code'];
            $pro_name=$_POST['name'];
            $pro_description=$_POST['description'];
            $pro_price=$_POST['price'];
            $pro_gazou_name_old=$_POST['gazou_name_old'];
            $pro_gazou_name=$_POST['gazou_name'];

            $pro_code=htmlspecialchars($pro_code);
            $pro_name=htmlspecialchars($pro_name);
            $pro_description=htmlspecialchars($pro_description);
            $pro_price=htmlspecialchars($pro_price);

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql ='UPDATE mst_product SET name=?,description=?,price=?,gazou=? WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$pro_name;
            $data[]=$pro_description;
            $data[]=$pro_price;
            $data[]=$pro_gazou_name;
            $data[]=$pro_code;
            $stmt->execute($data);

            $dbh=null;

            if($pro_gazou_name_old != $pro_gazou_name){
                if($pro_gazou_name_old !='')
                {
                    unlink('./gazou/'.$pro_gazou_name_old);
                }
            }

            print'<p class="my-4">'.$pro_name.'を修正しました。</p>';

        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
        }

        ?>

        <a class="btn btn-primary my-3" href="pro_list.php">戻る</a>
    </div>
</div>

<?php
require('../footer.php');
?>
