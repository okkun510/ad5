<?php
require ('dbconnect.php');

$members=[];

$sql = 'SELECT name, kana, gender, TIMESTAMPDIFF(YEAR,birthday,CURDATE()) AS age, birthday FROM members';

$statement = $database -> query($sql);

while ($member = $statement->fetch(PDO::FETCH_ASSOC)) {
    $members[] = $member;
}
