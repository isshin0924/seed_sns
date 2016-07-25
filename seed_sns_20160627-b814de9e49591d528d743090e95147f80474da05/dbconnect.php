<?php
//PDOはどんな種類でも使える
//セキュリティはmysqliに比べて低い

//mysqliはmysqlしか使えない
//ただセキュリティは高い
 $db = mysqli_connect('localhost', 'root', '', 'seed_sns') or die(mysqli_connect_error());
  // mysqli_connect('DBのホスト名','DBのユーザー名','DBのパスワード','DB名') die()は処理を停止する
  mysqli_set_charset($db,'utf8');
?>