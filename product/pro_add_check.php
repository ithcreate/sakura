<?php
require('../login_check.php');
require('../header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="h2">何もしない人追加</h1>
</div>

<div class="row justify-content-center">

    <div class="col-auto text-center">

        <?php

        $pro_name=$_POST['name'];
        $pro_description=$_POST['description'];
        $pro_price=$_POST['price'];
        $pro_gazou=$_FILES['gazou'];


        $pro_name=htmlspecialchars($pro_name);
        $pro_description=htmlspecialchars($pro_description);
        $pro_price=htmlspecialchars($pro_price);

        if($pro_name==''){
            print'何もしない人が入力されていません。<br>';
        }else{
            print'何もしない人:';
            print $pro_name;
            print'<br>';
        }
        
        if($pro_description==''){
            print'商品詳細が入力されていません。<br>';
        }else{
            print'商品詳細:';
            print $pro_description;
            print'<br>';
        }
        
        if(preg_match('/^[0-9]+$/',$pro_price)==0){
            print'価格をきちんと入力してください。<br>';
        }else{
            print'価格:';
            print $pro_price;
            print'円<br>';
        }

        if($pro_gazou['size']>0){
            if($pro_gazou['size']>1000000){
                print'画像が大き過ぎます';
            }else{
                move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
                print'<img class="img-fluid" src="./gazou/'.$pro_gazou['name'].'">';
                print'<br>';
            }
        }

        if($pro_name==''||$pro_description==''||preg_match('/^[0-9]+$/',$pro_price)==false || $pro_gazou['size']>1000000){
            print'<form>';
            print'<button type="button" class="btn btn-primary my-5" onclick="history.back()">戻る</button>';
            print'</form>';
        }else{
            print'上記の商品を追加します。<br>';
            print'<form method="post" action="pro_add_done.php">';
            print'<input type="hidden" name="name" value="'.$pro_name.'">';
            print'<input type="hidden" name="description" value="'.$pro_description.'">';
            print'<input type="hidden" name="price" value="'.$pro_price.'">';
            print'<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
            print'<br>';
            print'<div class="clearfix my-5">';
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
