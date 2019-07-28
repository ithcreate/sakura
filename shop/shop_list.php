<?php
require('../login_check.php');
require('../header_m.php');
?>
</div>
<!--/container -->

<header class="container-fluid px-3 mx-auto text-center bg-primary jumbotron">
    <h1 class="d-none">何もしない興行</h1>
    <h2 class="h2-md text-white">何もしない人提供　<br class="d-inline-block d-sm-none">サービス開始</h2>
    <p class="text-white">今流行りの、何もしない人を提供するプラットフォームサービスを開始します！！！</p>
    <div class="row">
        <div class="col-12">
            <img src="/sakura/img/1037176.png" class="w-50">
        </div>

    </div>
</header>
<!--/container -->

<div class="container">

    <div class="row">

        <div class="col-sm-9 text-center my-5">
            <h2>人気の何もしない人<br class="d-inline-block d-sm-none">一覧</h2>
        </div>

        <div class="col-sm-9">

            <?php

            try{

                require($_SERVER['DOCUMENT_ROOT'] . '/sakura/db_config.php');
                $sql = 'SELECT count(*) as cnt FROM mst_product WHERE 1';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sql = 'SELECT code,name,description,price,gazou FROM mst_product WHERE 1';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();

                $dbh = null;
                $row_count = 0;
                print '<div class="row mb-3 text-center">';
                    print '<div class="col-12">';
                        print'<div class="alert alert-primary mb-3 shadow" role="alert">';
                            print'現在'.$row["cnt"] .'人の『何もしない人』がエントリーしています。';
                        print'</div>';
                    print '</div>';
                print '</div>';
                
                while(true){
                    
                    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if($rec==false){
                        break;
                    }else{
                        $row_count = $row_count + 1;
                    }
                    
                    $pro_gazou_name=$rec['gazou'];

                    if($pro_gazou_name==''){
                        $disp_gazou='';
                    }else{
                        $disp_gazou='<img class="img-fluid rounded shadow" src="/sakura/product/gazou/'.$pro_gazou_name.'">';
                    }
                    
                    print'<div class="row py-3">';
                    
                        print'<div class="col-12">';
                            print'<h3 class="bg-primary text-white p-2 h4 text-center rounded">人気No.'.$row_count .'：'. $rec['name'] .'</h3>';
                        print'</div>';
                                
                        print'<div class="col-md-5">';
                            print'<a class="text-dark" href="shop_product.php?procode='.$rec['code'].'">';
                                print $disp_gazou;
                            print'</a>';
                        print '</div>';

                    
                        print'<div class="col-md-7 p-3">';
                    
                            print'<a class="text-dark text-decoration-none" href="shop_product.php?procode='.$rec['code'].'">';
                                print '<h4>特徴</h4>';
                                print $rec['description'];
                                print '<h4 class="mt-5">1日レンタル価格</h4>';
                                print number_format($rec['price']).'円(税込)';
                            print'</a>';
                            
                            print '<div class="row mt-5">';
                                print '<div class="col align-self-end">';
                                    print '<a class="d-block btn-lg btn-warning text-white rounded-pill text-center text-decoration-none" href="shop_product.php?procode='.$rec['code'].'">カートに入れる</a>';
                                print '</div>';
                            print '</div>';
                    
                        print'</div>';
                    
                    print'</div>';

                }
                    print'<div class="row border-top-0 pt-5 my-5 text-center">';
                        print '<div class="col">';
                            print'<a class="btn-lg btn-warning text-white text-decoration-none px-4 shadow-lg" href="shop_cartlook.php">カートを見る</a>';
                        print'</div>';
                    print'</div>';
                
            }catch (Exception $e){
                
                print'ただいま障害により大変ご迷惑をお掛けしております。';

            }
        ?>
        </div>

        <aside class="col-sm-3">
            <div class="text-center">
                <h2>Welcome</h2>
                <p class="small text-left">当サービスは、現在大流行中の『レンタルなんもしない人』を行っている『森本祥司』さんにインスピレーションを受けたサービスです。</p>
                <h2>Special Thanks</h2>
                <blockquote class="twitter-tweet">
                    <p lang="ja" dir="ltr">『レンタルなんもしない人』というサービスを始めます。1人で入りにくい店、ゲームの人数あわせ、花見の場所とりなど、ただ1人分の人間の存在だけが必要なシーンでご利用ください。<br>国分寺駅からの交通費と飲食代だけ（かかれば）もらいます。ごく簡単なうけこたえ以外なんもできかねます。</p>&mdash; レンタルなんもしない人 (@morimotoshoji) <a href="https://twitter.com/morimotoshoji/status/1003144421691424773?ref_src=twsrc%5Etfw">June 3, 2018</a>
                </blockquote>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </aside>

    </div>

    <?php
require('../footer_m.php');
?>
