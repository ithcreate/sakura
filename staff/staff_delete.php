<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ削除</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

        <?php

        try{

            $staff_code=$_GET['staffcode'];

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

        <p>このスタッフを削除してもよろしいですか？</p>
        <form method="post" action="staff_delete_done.php">
            <input type="hidden" name="code" value="<?php print $staff_code; ?>">
            <div class="clearfix my-5">
                <button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary float-right px-5 rounded-pill">OK</button>
            </div>
        </form>
    </div>
</div>

<?php
require('../footer.php');
?>
