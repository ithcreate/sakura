<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>会員ログイン</h1>
    <p class="small">※初回ご購入時に会員登録画面が表示されます。</p>
</div>

<div class="row justify-content-center">

    <div class="col-sm-4">

        <form method="post" action="member_login_check.php">
            <div class="form-group">
                <label for="email">登録メールアドレス</label>
                <input type="text" id="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="pass">パスワード</label>
                <input type="password" id="pass" class="form-control" name="pass">
            </div>
            <p class="small">※以下のログイン情報でログイン可能です<br>　ログインID：user@ithcreate.com<br>　パスワード:123</p>
            <button class="btn btn-primary rounded-pill btn-block" type="submit">ログイン</button>
        </form>
    </div>

</div>

<?php
require('../footer_m.php');
?>
