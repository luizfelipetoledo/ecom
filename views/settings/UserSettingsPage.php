<!DOCTYPE html>
<html lang="pt-BR">
<?= require  BASE_PATH . '/views/' . 'Header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($title) ?></h1>
    <p>Olá, <?= htmlspecialchars($user) ?> (<?= $id ?>).</p>
</body>
</html>