<?php
    header("Content-Type: text/html; charset=UTF-8");
    // エラーを出力する
    ini_set('display_errors', 1);
    // $ch = curl_init("https://twitter.com/search?q=%E3%82%AF%E3%83%AA%E3%82%B9%E3%82%BF%E3%83%AB%E3%82%AB%E3%82%A4%E3%82%B6%E3%83%BC&src=typd");
    // $res = curl_exec($ch);
    
    $json = json_decode($res, true);
    curl_close($ch);
    // foreach ($ch as  $key => $val) {
    //     print("Key: " . $key . " Value: " . $val);
    // }
 ?>
