<?php
require('../login_check.php');
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="h2">お客様情報を<br class="d-inline-block d-sm-none">入力してください</h1>
</div>

<div class="row justify-content-center">

    <div class="col-sm-6">

        <form method="post" action="shop_form_check.php">
            <div class="form-group form-row">
                <label class="col-3 text-right" for="onamae">お名前</label>
                <input type="text" id="onamae" class="form-control col-9" name="onamae">
            </div>
            <div class="form-group form-row">
                <label class="col-3 text-right" for="email">メールアドレス</label>
                <input type="text" id="email" class="form-control col-9" name="email">
            </div>
            <div class="form-group form-row">
                <label class="col-3 text-right" for="postal1">郵便番号</label>
                <div class="input-group col-9">
                    <input type="text" id="postal1" class="form-control" name="postal1">
                    <span class="input-group-text">―</span>
                    <input type="text" id="postal2" class="form-control" name="postal2">
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-3 text-right" for="address">住所</label>
                <input type="text" id="address" class="form-control col-9" name="address">
            </div>
            <div class="form-group form-row">
                <label class="col-3 text-right" for="tel">電話番号</label>
                <input type="text" id="tel" class="form-control col-9" name="tel">
            </div>
            <br>
            <div class="form-group form-row">
                <div class="col-3 text-right align-self-center pt-2">
                    <p>注文区分</p>
                </div>
                <div class="col-9">
                    <div class="form-check">
                        <input type="radio" id="chumon1" class="form-check-input" name="chumon" value="chumonkonkai"><label class="form-check-label" for="chumon1">会員登録せず注文</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="chumon2" class="form-check-input" name="chumon" value="chumontouroku" checked><label class="form-check-label" for="chumon2">会員登録して注文</label>
                    </div>
                </div>
            </div>
            <p class="text-center">※会員登録する方は以下の項目も入力してください。</p>
            <div class="form-group form-row">
                <label class="col-4 text-right" for="pass">パスワード</label>
                <input type="password" id="pass" class="form-control col-8" name="pass">
            </div>
            <div class="form-gropu form-row">
                <label class="col-4 text-right" for="pass2">パスワードの確認</label>
                <input type="password" id="pass2" class="form-control col-8" name="pass2">
            </div>
            <div class="form-gropu form-row mt-3">
                <div class="col-3 text-right">
                    <p class="mt-2">性別</p>
                </div>
                <div class="col-9">
                    <div class="form-check">
                        <input type="radio" id="danjo1" class="form-check-input" name="danjo" value="dan" checked><label for="danjo1" class="form-check-label" checked>男性</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="danjo2" class="form-check-input" name="danjo" value="jo"><label for="danjo2" class="form-check-label">女性</label>
                    </div>
                </div>
            </div>

            <div class="form-group form-row">
                <label class="mt-4 col-3 text-right" for="birth">生まれ年</label>
                <select id="birth" class="form-control col-9 mt-3" name="birth">
                    <option value="1910">1910年代</option>
                    <option value="1920">1920年代</option>
                    <option value="1930">1930年代</option>
                    <option value="1940">1940年代</option>
                    <option value="1950">1950年代</option>
                    <option value="1960">1960年代</option>
                    <option value="1970">1970年代</option>
                    <option value="1980">1980年代</option>
                    <option value="1990">1990年代</option>
                    <option value="2000">2000年代</option>
                    <option value="2010">2010年代</option>
                </select>
            </div>
            <div class="clearfix">
                <button class="btn btn-primary" type="button" onclick="history.back()">戻る</button>
                <button class="btn btn-warning px-5 rounded-pill text-white float-right" type="submit">注文を確認する</button>
            </div>
        </form>

    </div>

</div>

<?php
require('../footer_m.php');
?>
