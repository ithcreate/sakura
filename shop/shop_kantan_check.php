<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>注文最終確認画面</h1>
</div>

<div class="row justify-content-center">

    <div class="col-sm-6">

        <?php
        $code=$_SESSION['member_code'];

        require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');

        $sql = 'SELECT name,email,postal1,postal2,address,tel FROM dat_member WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$code;
        $stmt->execute($data);
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

        $dbh = null;

        $onamae=$rec['name'];
        $email=$rec['email'];
        $postal1=$rec['postal1'];
        $postal2=$rec['postal2'];
        $address=$rec['address'];
        $tel=$rec['tel'];
        ?>

        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row" style="width:40%">お名前</th>
                    <td><?php print $onamae; ?></td>
                </tr>
                <tr>
                    <th scope="row">メールアドレス</th>
                    <td><?php print $email; ?></td>
                </tr>
                <tr>
                    <th scope="row">郵便番号</th>
                    <td><?php print $postal1; ?>-<?php print $postal2; ?></td>
                </tr>
                <tr>
                    <th scope="row">住所</th>
                    <td><?php print $address; ?></td>
                </tr>
                <tr>
                    <th scope="row">電話番号</th>
                    <td><?php print $tel; ?></td>
                </tr>
            </tbody>
        </table>

        <form method="post" action="shop_kantan_done.php">
            <input type="hidden" name="onamae" value="<?php print $onamae; ?>">
            <input type="hidden" name="email" value="<?php print $email; ?>">
            <input type="hidden" name="postal1" value="<?php print $postal1; ?>">
            <input type="hidden" name="postal2" value="<?php print $postal2; ?>">
            <input type="hidden" name="address" value="<?php print $address; ?>">
            <input type="hidden" name="tel" value="<?php print $tel; ?>">
            <div class="clearfix">
                <button class="btn btn-primary" type="button" onclick="history.back()">戻る</button>
                <button class="btn btn-warning px-5 rounded-pill text-white float-right" type="submit">注文を完了する</button>
            </div>
        </form>


    </div>

</div>

<?php
require('../footer_m.php');
?>
