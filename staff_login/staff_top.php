<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>管理画面TOP</h1>
    <p class="small">メニューをお選びください。</p>
</div>

<div class="row justify-content-center">

    <div class="col-md-4 text-center">
        <ul class="list-group">
            <li class="list-group-item active">メニュー</li>
            <li class="list-group-item"><a class="text-decoration-none" href="../staff/staff_list.php">スタッフ管理</a></li>
            <li class="list-group-item"><a class="text-decoration-none" href="../product/pro_list.php">何もしない人管理</a></li>
            <li class="list-group-item"><a class="text-decoration-none" href="../order/order_download.php">注文データダウンロード</a></li>
            <li class="list-group-item"><a class="text-decoration-none" href="staff_logout.php">ログアウト</a></li>
        </ul>

        <img src="/sakura/img/1037176.png" class="img-fluid">

    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4 text-center">
        <h2>Special Thanks</h2>
        <blockquote class="twitter-tweet" data-lang="ja">
            <p lang="ja" dir="ltr">トークイベント「おっさんレンタル×レンタルなんもしない人」にて、レンタルなんもしない人(<a href="https://twitter.com/morimotoshoji?ref_src=twsrc%5Etfw">@morimotoshoji</a>) さんと🐸かえるのピクルス🐸で記念に撮らせてくださいました｡<br>Twitterに載せても良いですか？と伺ったら「自分フリー素材なんで」とフリー素材モデル・大川竜弥さんの前で仰っていました｡ <a href="https://t.co/s69mha82wt">pic.twitter.com/s69mha82wt</a></p>&mdash; みんと@青森のピクルス (@piclovepic) <a href="https://twitter.com/piclovepic/status/1059916199738380289?ref_src=twsrc%5Etfw">2018年11月6日</a>
        </blockquote>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>

</div>

<?php
require('../footer.php');
?>
