<!DOCTYPE html>
<html lang="ja">
<?php include"head.html";
include"functions.php";

// 入力チェック
if(
    !isset($_POST["employ_id"]) || $_POST["employ_id"]=="" ||
    !isset($_POST["employ_name"]) || $_POST["employ_name"]=="" ||
    !isset($_POST["employ_yomi"]) || $_POST["employ_yomi"]=="" ||
    !isset($_POST["employ_birthday"]) || $_POST["employ_birthday"]=="" ||
    !isset($_POST["employ_hiredate"]) || $_POST["employ_hiredate"]=="" ||
    !isset($_POST["employ_Hwage"]) || $_POST["employ_Hwage"]=="" ||
    !isset($_POST["employ_memo"]) || $_POST["employ_memo"]==""
){
    exit("ParamError");
}





$employ_id = $_POST["employ_id"];
$employ_name = $_POST["employ_name"];
$employ_yomi = $_POST["employ_yomi"];
$employ_birthday = $_POST["employ_birthday"];
$employ_hiredate = $_POST["employ_hiredate"];
$employ_Hwage = $_POST["employ_Hwage"];
$employ_memo = $_POST["employ_memo"];


try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch(PDOException $e){
    exit('データベースに接続できませんでした'.$e->getMessage());
}

$sql = "INSERT INTO gs_an_table(id, employ_id, employ_name, employ_yomi, employ_birthday, employ_hiredate, employ_Hwage, employ_memo,
employ_updatetime ) VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6, :a7, sysdate())";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":a1", $employ_id, PDO::PARAM_INT);
$stmt->bindValue(":a2", $employ_name, PDO::PARAM_STR);
$stmt->bindValue(":a3", $employ_yomi, PDO::PARAM_STR);
$stmt->bindValue(":a4", $employ_birthday, PDO::PARAM_INT);
$stmt->bindValue(":a5", $employ_hiredate, PDO::PARAM_INT);
$stmt->bindValue(":a6", $employ_Hwage, PDO::PARAM_INT);
$stmt->bindValue(":a7", $employ_memo, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    header("Location: employ_input.php");
    exit();
}

// $str = $employ_id.",".$employ_name.",".$employ_yomi.",".$employ_birthday.",".$employ_entryday.",".$employ_Hwage;
// $str_SJIS = mb_convert_encoding($str, 'SJIS-win','UTF-8');

// $file = fopen("employ/employ.csv","a");
// flock($file, LOCK_EX);
// fwrite($file,$str_SJIS."\n");
// flock($file, LOCK_UN);
// fclose($file);

?>

<body>

<header>
    <h1>新規登録</h1>
    <h2>登録しました</h2>

</header>

<table>
    <tr>
        <td>社員番号</td>
        <td><?=h($employ_id)?></td>
    </tr>
    <tr>
        <td>氏名</td>
        <td><?=h($employ_name)?></td>
    </tr>
    <tr>
        <td>ふりがな</td>
        <td><?=h($employ_yomi)?></td>
    </tr>
    <tr>
        <td>生年月日</td>
        <td><?=h($employ_birthday)?></td>
    </tr>
    <tr>
        <td>入社日</td>
        <td><?=h($employ_entryday)?></td>
    </tr>
    <tr>
        <td>時給</td>
        <td><?=h($employ_Hwage)?></td>
    </tr>

</table>

<a href="employ_input.php"><button>続けて登録</button></a>
<button>閉じる</button>

</body>
</html>