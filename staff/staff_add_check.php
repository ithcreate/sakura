<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>スタッフ追加</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        $staff_name=$_POST['name'];
        $staff_pass=$_POST['pass'];
        $staff_pass2=$_POST['pass2'];

        $staff_name=htmlspecialchars($staff_name);
        $staff_pass=htmlspecialchars($staff_pass);
        $staff_pass2=htmlspecialchars($staff_pass2);

        if($staff_name==''){
            print'スタッフ名が入力されていません。<br>';
        }
        else{
            print'スタッフ名:';
            print $staff_name.'を追加します';
            print'<br>';
        }

        if($staff_pass==''){
            print'パスワードが入力されていません。<br>';
        }

        if($staff_pass!=$staff_pass2){
            print'パスワードが一致しません。<br>';
        }

        if($staff_name==''||$staff_pass==''||$staff_pass!=$staff_pass2){
            print'<form class="text-right">';
            print'<button type="button" class="btn btn-primary my-5" onclick="history.back()">戻る</button>';
            print'</form>';
        }else{
            $staff_pass=md5($staff_pass);
            print'<form method="post" action="staff_add_done.php">';
            print'<input type="hidden" name="name" value="'.$staff_name.'">';
            print'<input type="hidden" name="pass" value="'.$staff_pass.'">';
            print'<br>';
            print'<div class="clearfix my-4">';
            print'<button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>';
            print'<button type="submit" class="btn btn-primary float-right px-5 rounded-pill">OK</button>';
            print'</div>';
            print'</form>';
        }

        ?>
    </div>
</div>

<?php
require('../footer.php');
?>
