<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>何もしない人追加</h1>
</div>

<div class="row justify-content-center">

    <div class="col-sm-5">

        <form method="post" action="pro_add_check.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">何もしない人を入力してください</label>
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="description">商品説明を入力してください。</label>
                <textarea id="description" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">価格を入力してください。(税込円）</label>
                <input type="text" id="price" class="form-control" name="price">
            </div>
            <div class="form-group">
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
