<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ追加</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        try{

            $staff_name=$_POST['name'];
            $staff_pass=$_POST['pass'];

            $staff_name=htmlspecialchars($staff_name);
            $staff_pass=htmlspecialchars($staff_pass);

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql ='INSERT INTO mst_staff(name,password) VALUES (?,?)';
            $stmt=$dbh->prepare($sql);
            $data[]=$staff_name;
            $data[]=$staff_pass;
            $stmt->execute($data);

            $dbh=null;

            print$staff_name;
            print'さんを追加しました。<br>';

        }
        catch(Exception $e){
            print'ただいま障害により大変ご迷惑をお掛けしております。';
        }

        ?>

        <a class="btn btn-primary my-5" href="staff_list.php">戻る</a>
    </div>
</div>

<?php
require('../footer.php');
?>
