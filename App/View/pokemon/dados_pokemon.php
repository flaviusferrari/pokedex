Dados do Pokemon desejado: 
<br>

Nome: <?= $pokemon->name; ?><br>
Foto: <?= $pokemon->front_default; ?><br>
Peso: <?= $pokemon->weight; ?><br>
Altura: <?= $pokemon->height; ?><br>
Tipos: 
<?php foreach ($pokemon->types as $item): ?>
    <?= $item->type->name; ?> - 
<?php endforeach; ?>
