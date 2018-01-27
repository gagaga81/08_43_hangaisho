<!DOCTYPE html>
<html lang="ja">

<?php 
include"head.html"; ?>

<script>
    function imageup(){
        window.open("employ_input.php","window1","width=300px,height=300px");
    }
</script>
<body>
    <?php include"header.html" ?>
<a href="javascript:imageup();" target="_blank"><button>新規登録</button></a>


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
<?php 

try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch(PDOException $e){
    exit('データベースに接続できませんでした'.$e->getMessage());
}


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
        $view .= $result["id"];
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

echo $view;




// function employ_display(){
    // $fp = fopen("employ/employ.csv","r");

    // $n = 0;
    // while(($array = fgetcsv($fp))!==false){

    //     if($n == 0){
    //         $n++;
    //         continue;
    //     }

    //     echo "<tr>";
    //     for($i=0;$i < count($array); ++$i){
    //         $elem = nl2br(mb_convert_encoding($array[$i],"UTF-8","SJIS"));
    //         $elem = $elem === "" ? "&nbsp;":$elem;
    //         echo("<td>".$elem."</td>");
    //     }
    //     echo "</tr>";
    // }

    // fclose($fp);
// }
?>




</table>


</body>
</html>