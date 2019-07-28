<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true){
	setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>

<?php
require('../header_m.php');
?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>カートの中身</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto">
        <p>カートを空にしました。</p>

        <div class="mt-5 text-center"><a class="btn btn-primary" href="shop_list.php">商品一覧に戻る</a></div>
    </div>


</div>

<?php
require('../footer_m.php');
?>
