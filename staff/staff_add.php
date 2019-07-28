<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ追加</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">

        <form method="post" action="staff_add_check.php">
            <div class="form-group">
                <label for="name">スタッフ名を入力してください</label>
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="form-group">パスワードを入力してください。</label>
                <input type="password" id="pass" class="form-control" name="pass">
            </div>
            <div class="form-group">
                <label for="pass2">パスワードをもう１度入力してください。</label>
                <input type="password" id="pass2" class="form-control" name="pass2">
            </div>
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
