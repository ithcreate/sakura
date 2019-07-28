<?php
    $dsn = 'mysql:dbname=_nanimosinai;host=mysql008.phy.heteml.lan';
    $user='_nanimosinai';
    $password='test1111';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');
?>
