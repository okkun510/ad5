<?php include ('reference.php'); ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>社員一覧</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>

    <body>
    <div>
        <h1>社員一覧</h1>
    </div>

    <form action="" method="get" class="form">
        氏名  <input type="text" name="name" value="<?php echo $name; ?>" class="index_form">
        性別  <select name="gender">
                <option value="0" <?php if('0' == $gender): ?>selected<?php endif; ?>>全て</option>
                <option value="1" <?php if('1' == $gender): ?>selected<?php endif; ?>>男</option>
                <option value="2" <?php if('2' == $gender): ?>selected<?php endif; ?>>女</option>
            </select>
            <button type="submit" style="height: 30px;" class="btn">検索</button>
    </form>


    <?php if(count($members) == 0) : ?>
        <p>該当する社員はいません</p>
    <?php else : ?>
        <table>
            <tr>
                <th>氏名</th>
                <th>かな</th>
                <th>性別</th>
                <th>年齢</th>
                <th>生年月日</th>
            </tr>
            <?php foreach($members as $member) :?>
            <tr>
                <td><?php echo $member['name']; ?></td>
                <td><?php echo $member['kana']; ?></td>
                <td><?php if ($member['gender'] == 1) :?>
                        <?php echo '男'; ?>
                    <?php elseif ($member['gender'] == 2) : ?>
                        <?php echo '女'; ?>
                    <?php elseif (is_null($member['gender'])) : ?>
                        <?php echo '不明'; ?>
                    <?php endif; ?>
                <td><?php echo $member['age']; ?></td>
                <td><?php echo $member['birthday']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <p class="from_to"><?php echo $count['cnt']; ?>件中 <?php echo $from_record; ?> - <?php echo $to_record;?> 件目を表示</p>


    <div class="pagination">
        <?php if ($page >= 2): ?>
            <span class="page_feed"><a href="index.php?page=<?php echo($page - 1); ?>&name=<?php echo $name ?>&gender=<?php echo $gender ?>">&laquo;</a></span>
        <?php else : ;?>
            <span class="first_last_page">&laquo;</span>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $max_page; $i++) : ?>
            <?php if($i >= $page - $range && $i <= $page + $range) : ?>
                <?php if($i == $page) : ?>
                    <span class="now_page_number"><?php echo $i; ?></span>
                <?php else: ?>
                    <span class="page_number"><a href="?page=<?php echo $i; ?>&name=<?php echo $name ?>&gender=<?php echo $gender ?>"><?php echo $i; ?></a></span>
                <?php endif; ?>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if($page < $max_page) : ?>
            <span class="page_feed"><a href="index.php?page=<?php echo($page + 1); ?>&name=<?php echo $name ?>&gender=<?php echo $gender ?>">&raquo;</a></span>
        <?php elseif ($count['cnt'] < 5) : ;?>
            <span class="first_last_page">&raquo;</span>
        <?php endif; ?>
    </div>

</body>
    </html>
