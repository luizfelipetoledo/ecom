<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Meu Ecommerce') ?></title>
</head>
<body>
    <header style="padding: 16px; background: #f87a7a;">
        <h1>Meu Ecommerce</h1>
        <nav>
            <a href="/">Home</a> |
            <a href="/settings">Configurações</a> |
            <a href="/produtos">Produtos</a>
        </nav>
    </header>

    <main style="padding: 20px;">
        <?= $content ?>
    </main>

    <footer style="padding: 16px; background: #da6060; margin-top: 20px;">
        <small>&copy; <?= date('Y') ?> Meu Ecommerce</small>
    </footer>
</body>
</html>