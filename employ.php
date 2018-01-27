<!DOCTYPE html>
<html lang="ja">

<?php 
include("head.html");
include("functions.php");

// DB接続
$pdo = db_con();


// データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//　データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);

}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<tr><td>";
        $view .= "<a href='employ_detail.php?id=".$result["id"]."'>";
        $view .= $result["id"];
        $view .= "</a>";
        $view .= "</td><td>";
        $view .= $result["employ_id"];
        $view .= "</td><td>";
        $view .= $result["employ_name"];
        $view .= "</td><td>";
        $view .= $result["employ_yomi"];
        $view .= "</td><td>";
        $view .= $result["employ_birthday"];
        $view .= "</td><td>";
        $view .= $result["employ_hiredate"];
        $view .= "</td><td>";
        $view .= $result["employ_Hwage"];
        $view .= "</td><td>";
        $view .= $result["employ_memo"];
        $view .= "</td><td>";
        $view .= $result["employ_updatetime"];
        $view .= "</td></tr>";
        
    }
}

 ?>

<body>
    <?php include"header.html" ?>
<a href="javascript:imageup('employ_input.php');"><button>新規登録</button></a>


<table>
    <tr>
        <th>id</th>
        <th>社員番号</th>
        <th>氏名</th>
        <th>ふりがな</th>
        <th>生年月日</th>
        <th>入社日</th>
        <th>時給</th>
        <th>メモ</th>
        <th>更新日時</th>
    </tr>

    <?=$view?>
</table>


</body>
</html>