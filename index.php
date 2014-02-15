<?php
$records = json_decode(file_get_contents(__DIR__ . '/result.json'));
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>三年甲班成績單</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1>三年甲班成績單</h1>
<table class="table">
    <tr>
        <td>姓名</td>
        <td>國語</td>
        <td>數學</td>
        <td>自然</td>
        <td>社會</td>
        <td>健康教育</td>
    </tr>
    <?php foreach ($records as $record) {?>
    <tr>
        <td><?= htmlspecialchars($record->name) ?></td>
        <?php foreach (array('國語', '數學', '自然', '社會', '健康教育') as $grade) {?>
        <td><?= intval($record->grades->{$grade}) ?></td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
</body>
</html>
