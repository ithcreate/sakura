<?php
require('../login_check.php');
require('../header.php');
?>

<?php

try{

  require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

  $sql = 'SELECT code,name FROM mst_staff WHERE 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $dbh = null;
  
  ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ一覧</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

        <form method="post" action="staff_branch.php">

            <?php

                  while(true){
                      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                      if($rec==false)
                      {
                          break;
                      }
                      print'<div class="form-check  mt-2">';
                      print'<input class="form-check-input" type="radio" id="staffcode' .$rec['code'] .'" name="staffcode" value="'.$rec['code'].'">';
                      print '<label class="form-check-label ml-2" for="staffcode' .$rec['code'] .'">' .$rec['name'].'</label>';
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
