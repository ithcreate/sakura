<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ削除</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        try{

            $staff_code=$_POST['code'];

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql ='DELETE FROM mst_staff WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$staff_code;
            $stmt->execute($data);

            $dbh=null;

        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>

        <p>削除しました。</p>
        <a class="btn btn-primary my-5" href="staff_list.php">戻る</a>

    </div>
</div>

<?php
require('../footer.php');
?>
