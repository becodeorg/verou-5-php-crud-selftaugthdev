<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Goodcard - track your collection of Pokémon cards</h1>

<ul>
    <?php if (is_array($cards)): ?>
        <?php foreach ($cards as $card): ?>
            <li><?= htmlspecialchars($card['Name'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($card['Type'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($card['Ability'], ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No cards found.</li>
    <?php endif; ?>
</ul>

</body>
</html>


