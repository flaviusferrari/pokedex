<?php view('layout/header'); ?>

<h1>listagem dos pokemons </h1>

<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Imagem</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Tipo</th>
    </thead>

    <tbody>
        <?php foreach($pokemons as $item): ?>
            <tr>
                <td><?= $item->id; ?></td>
                <td><?= $item->name; ?></td>
                <td><?= $item->front_default; ?></td>
                <td><?= $item->weight; ?></td>
                <td><?= $item->height; ?></td>
                <td><?= $item->types; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
<a href="/">Buscar</a>

<?php view('layout/footer'); ?>