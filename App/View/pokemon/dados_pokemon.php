<?php view('layout/header'); ?>

Dados do Pokemon desejado: 
<br>

Nome: <?= $pokemon->name; ?><br>
Foto: <?= $pokemon->sprites->front_default; ?><br>
Peso: <?= $pokemon->weight; ?><br>
Altura: <?= $pokemon->height; ?><br>
Tipos: 
<?php $types = ''; ?>
<?php foreach ($pokemon->types as $item): ?>
    <?php $types .= $item->type->name . '|' ?>
    <?= $item->type->name; ?> - 
<?php endforeach; ?>

<form action="/pokemon/save" method="post">
    <input type="hidden" name="nome" value="<?= $pokemon->name; ?>">
    <input type="hidden" name="foto" value="<?= $pokemon->sprites->front_default; ?>">
    <input type="hidden" name="peso" value="<?= $pokemon->weight; ?>">
    <input type="hidden" name="altura" value="<?= $pokemon->height; ?>">
    <input type="hidden" name="tipo" value="<?= $types; ?>">
    <button type="submit">Favoritar</button>
</form>
<a href="/">Home</a>

<?php view('layout/footer'); ?>
