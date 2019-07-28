<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>何もしない人追加</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        try{

            $pro_name=$_POST['name'];
            $pro_description=$_POST['description'];
            $pro_price=$_POST['price'];
            $pro_gazou_name=$_POST['gazou_name'];

            $pro_name=htmlspecialchars($pro_name);
            $pro_description=htmlspecialchars($pro_description);
            $pro_price=htmlspecialchars($pro_price);

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql ='INSERT INTO mst_product(name,description,price,gazou) VALUES (?,?,?,?)';
            $stmt=$dbh->prepare($sql);
            $data[]=$pro_name;
            $data[]=$pro_description;
            $data[]=$pro_price;
            $data[]=$pro_gazou_name;
            $stmt->execute($data);

            $dbh=null;

            print$pro_name;
            print'を追加しました。<br />';

        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>

        <a class="btn btn-primary my-5" href="pro_list.php">戻る</a>
    </div>
</div>

<?php
require('../footer.php');
?>
