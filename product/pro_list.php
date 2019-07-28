<?php
require('../login_check.php');
require('../header.php');
?>

<?php

try{

    require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

    $sql = 'SELECT code,name,description,price FROM mst_product WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
?>

<img src="../img/640431.png" width="500">私でも役に立てるのかしら＼大丈夫／

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>何もしない人一覧</h1>
</div>

<div class="row justify-content-center mb-5">

    <div class="col-auto">
        <form method="post" action="pro_branch.php">
            <?php
                while(true){
                    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($rec==false){
                        break;
                    }
                    print'<div class="form-check mt-4">';
                    print'<input class="form-check-input mt-4" type="radio" id="procode' .$rec['code'] .'" name="procode" value="'.$rec['code'].'">';
                    print '<label class="form-check-label ml-3" for="procode' .$rec['code'] .'">' .$rec['name'].'<br>'.$rec['description'].'<br>'.$rec['price'].'円</label>';
                    print'</div>';
                }
            ?>
            <div class="my-5 text-center">
                <button class="btn btn-primary" type="submit" name="disp">参照</button>
                <button class="btn btn-primary" type="submit" name="add">追加</button>
                <button class="btn btn-primary" type="submit" name="edit">修正</button>
                <button class="btn btn-primary" type="submit" name="delete">削除</button>
            </div>

        </form>
        <?php

}catch (Exception $e){
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

    </div>
</div>

<?php
require('../footer.php');
?>
