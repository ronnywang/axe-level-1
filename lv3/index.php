<?php

ini_set('session.save_handler', 'files');
ini_set('session.save_path', '/tmp');

session_start();

$records = json_decode(file_get_contents(__DIR__ . '/answer.json'));
$total_page = ceil(count($records) / $per_page);
$page = max(1, intval($_SESSION['page']));
if ($_GET['page'] == 'next') {
    $_SESSION['page'] = min($page + 1, $total_page);
} elseif ($_GET['page'] == 'prev') {
    $_SESSION['page'] = max($page - 1, 1);
}
$per_page = 10;
$records = array_slice($records, ($page - 1) * $per_page, $per_page);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>台南市村里長名單</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1>台南市村里長名單</h1>
第 <?= $page ?> 頁
<table class="table">
    <tr>
        <td>鄉鎮</td>
        <td>村里</td>
        <td>姓名</td>
    </tr>
    <?php foreach($records as $record) {?>
    <tr>
        <td><?= htmlspecialchars($record->town) ?></td>
        <td><?= htmlspecialchars($record->village) ?></td>
        <td><?= htmlspecialchars($record->name) ?></td>
    </tr>
    <?php } ?>
</table>
<?php if ($page > 1) { ?>
<a href='?page=prev'>上一頁</a>
<?php } else { ?>
上一頁
<?php } ?>
第 <?= $page ?> 頁
<?php if ($page < $total_page) { ?>
<a href='?page=next'>下一頁</a>
<?php } else { ?>
下一頁
<?php } ?>
</body>
</html>
