<?php require ('dbconnect.php'); ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>社員登録</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>

    <body>
    <div>
        <h1>社員登録</h1>
    </div>

        <p>登録しました</p>

    <form action="" method="post" class="">

        <h4>氏名 <span class="must">必須</span></h4>
        <input type="text" name="name" class="name_form">

        <h4>かな <span class="must">必須</span></h4>
        <input type="text" name="kana" class="name_form">

        <h4>性別</h4>
        <select name="gender" style="height: 30px;" class="gender_form">
            <option disable selected>選択</option>
            <option value="0">全て</option>
            <option value="1">男</option>
            <option value="2">女</option>
        </select>

        <h4>生年月日</h4>
        <input type="date" name="birthday">

        <br/>
        <button type="submit" style="height: 30px;" class="btn">検索</button>
    </form>
    </body>
</html>
