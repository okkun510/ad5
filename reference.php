
<?php
require ('dbconnect.php');

//GETされた値を格納する
if(isset($_GET['name'])){
    $name = $_GET['name'];
} else {
    $name = '';
}

//三項演算子
//$name = isset($_POST['name']) ? $_POST['name'] : '';
//null合体演算子
//$name = $_POST['name'] ?? '';

if(isset($_GET['gender'])) {
    $gender = $_GET['gender'];
} else {
    $gender = '0';
}

$members=[];

//データベース内検索
$sql = 'SELECT name, kana, gender, TIMESTAMPDIFF(YEAR,birthday,CURDATE()) AS age, birthday FROM members WHERE 1 = 1 ';
$count_sql = 'SELECT COUNT(*) as cnt FROM members WHERE 1 = 1 ';

if ($name) {
    $sql = $sql . 'AND (name LIKE "%' . $name . '%" OR kana LIKE "%' . $name . '%")';
    $count_sql = $count_sql . 'AND (name LIKE "%' . $name . '%" OR kana LIKE "%' . $name . '%")';
}
if ($gender != 0) {
    $sql = $sql . 'AND gender=' . $gender;
    $count_sql = $count_sql . 'AND gender=' . $gender;
}

//表示件数制御
if(isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

//件数表示
$start = 5 * ($page - 1);

$statement = $database -> prepare($sql . ' ORDER BY id LIMIT ?, 5');
$statement -> bindParam(1, $start, PDO::PARAM_INT);
$statement -> execute();


//検索結果表示
while ($member = $statement->fetch(PDO::FETCH_ASSOC)) {
    $members[] = $member;
}

//最大ページ数
$counts = $database -> query($count_sql);
$count = $counts -> fetch(PDO::FETCH_ASSOC);
$max_page = ceil($count['cnt'] / 5);

//($from_record) 件目 - ($to_record) 件目を表示
$from_record = ($page - 1) * 5 + 1;

if($page == $max_page && $count['cnt'] % 5 !== 0) {
    $to_record = ($page - 1) * 5 + $count['cnt'] % 5;
} else {
    $to_record = $page * 5;
}

if($page == 1 || $page == $max_page) {
    $range = 4;
} elseif ($page == 2 || $page ==$max_page - 1) {
    $range = 3;
} else {
    $range = 2;
}

/*
$member = $statement->fetch(PDO::FETCH_ASSOC)
while ($member) {
    $members[] = $member;
    $member = $statement->fetch(PDO::FETCH_ASSOC)
}
*/
