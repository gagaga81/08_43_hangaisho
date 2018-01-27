<?php

// XSS対策
function h($value) {
    return htmlspecialchars($value,ENT_QUOTES);
    }

// DB接続
function db_con(){
    try {
        $pdo = new PDO('mysql:dbname=gs_work_db;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。'.$e->getMessage());
    }
}

//　SQL処理エラー
function error_db_info($stmt){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}

/*----------------------------------------------
以下、自分で考えて入れた関数たち
----------------------------------------------*/

// うまくいかない、、、、
// function up_window($id){
//     $str .="javascript:imageup('employ_detail.php?id=";
//     $str .=$id;
//     $str .="');"
//     return $str;
// }





?>
