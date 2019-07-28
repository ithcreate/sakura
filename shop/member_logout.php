<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>

<?php
require('../header_m.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>ログアウト</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <p>ログアウトしました。</p>
        <a class="btn btn-primary px-4 my-4" href="shop_list.php">商品一覧へ</a>

    </div>

</div>

<?php
require('../footer_m.php');
?>
