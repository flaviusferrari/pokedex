<?php view('layout/header'); ?>

<h1>Listagem dos pokemons </h1>

<div class="row">
    <div class="col">
        <table class="table">
            <thead  class="thead-dark">
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
                        <td>
                            <img src="<?= $item->front_default; ?>" alt="<?= $item->name; ?>">
                        </td>
                        <td><?= $item->weight; ?></td>
                        <td><?= $item->height; ?></td>
                        <?php $tipos = json_decode($item->types); ?>
                        <td>
                            <?php foreach($tipos as $tipo): ?>
                                <?= $tipo; ?> | 
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="/">Home</a>
    </div>
</div>
<hr>

<?php view('layout/footer'); ?>