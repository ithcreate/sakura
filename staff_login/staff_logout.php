<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>

<?php
require('../header.php');
?>

<p>ログアウトしました。</p>
<a href="../staff_login/staff_login.html">ログイン画面へ</a>

<?php
require('../footer.php');
?>
