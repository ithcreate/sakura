<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>ダウンロード日選択画面</h1>
</div>

<div class="row justify-content-center">

    <div class="col-sm-5 text-center">

        <?php
        require_once('../common/common.php');
        ?>

        <p>ダウンロードしたい注文日を選んでください。</p>
        <form method="post" action="order_download_done.php">
            <?php pulldown_year(); ?>
            年
            <?php pulldown_month(); ?>
            月
            <?php pulldown_day(); ?>
            日<br />
            <br />
            <button class="btn btn-warning rounded-pill text-white px-5" type="submit">ダウンロードへ</button>
        </form>

    </div>
</div>

<?php
require('../footer.php');
?>
