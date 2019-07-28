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

            $pro_code=$_GET['procode'];

            $dsn='mysql:dbname=shop;host=localhost';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->query('SET NAMES utf8');

            $sql='SELECT name,gazou FROM mst_product WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$pro_code;
            $stmt->execute($data);

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name=$rec['name'];
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
            <dt class="col-auto">何もしない人コード</dt>
            <dd class="col-auto"><?php print $pro_code; ?></dd>
        </dl>
        <dl class="row">
            <dt class="col-auto">何もしない人</dt>
            <dd class="col-auto"><?php print $pro_name; ?></dd>
        </dl>

        <?php print $disp_gazou; ?>
        <p>この商品を削除してもよろしいですか？</p>
        <form method="post" action="pro_delete_done.php">
            <input type="hidden" name="code" value="<?php print $pro_code; ?>">
            <input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
            <div class="clearfix">
                <button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary float-right px-5 rounded-pill">OK</button>
            </div>
        </form>

    </div>
</div>

<?php
require('../footer.php');
?>
