<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ参照</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        try{

            $staff_code = $_GET['staffcode'];

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql='SELECT name FROM mst_staff WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$staff_code;
            $stmt->execute($data);

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name=$rec['name'];

            $dbh=null;

        }catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>

        <dl class="row">
            <dt class="col-auto">スタッフコード</dt>
            <dd class="col-auto"><?php print $staff_code; ?></dd>
        </dl>
        <dl class="row">
            <dt class="col-auto">スタッフ名</dt>
            <dd class="col-auto"><?php print $staff_name; ?></dd>
        </dl>

        <form>
            <button type="button" class="btn btn-primary my-5" onclick="history.back()">戻る</button>
        </form>
    </div>
</div>

<?php
require('../footer.php');
?>
