<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="h2">何もしない人修正</h1>
</div>

<div class="row justify-content-center mb-5">

    <div class="col-auto">

        <?php

        try{

            $pro_code=$_GET['procode'];

            require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

            $sql = 'SELECT name,description,price,gazou FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            $pro_description = $rec['description'];
            $pro_price = $rec['price'];
            $pro_gazou_name_old = $rec['gazou'];

            $dbh = null;

            if($pro_gazou_name_old==''){
                $disp_gazou='';
            }else{
                $disp_gazou='<img class="img-fluid" src="./gazou/'.$pro_gazou_name_old.'">';
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

        <form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
            <input type="hidden" name="code" value="<?php print $pro_code; ?>">
            <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
            <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php print $pro_name; ?>">
            </div>
            <div class="form-group">
                <label for="description">商品説明を入力してください。</label>
                <textarea id="description" class="form-control" name="description"><?php print $pro_description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">価格(税込円)</label>
                <input type="text" id="price" class="form-control" name="price" value="<?php print $pro_price; ?>">
            </div>
            <div class="form-group">
                <p><?php print $disp_gazou; ?></p>
                <label for="gazou">画像を選んでください。</label>
                <input type="file" id="gazou" class="form-control-file" name="gazou">
            </div>

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
