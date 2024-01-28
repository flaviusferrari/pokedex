<?php view('layout/header'); ?>

<h1>Dados do Pokemon desejado</h1> 

<form action="/pokemon/save" method="post">
    <div class="row">   
        <div class="col-1">
            <img src="<?= $pokemon->sprites->front_default; ?>" alt="">
            <input type="hidden" name="foto" value="<?= $pokemon->sprites->front_default; ?>">
        </div>
        <div class="col-11">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nome">Nome</label><br>
                        <input type="text" class="form-control" name="nome" value="<?= $pokemon->name; ?>" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Peso</label>
                        <input type="text" class="form-control" name="peso" value="<?= $pokemon->weight; ?>" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Altura</label>
                        <input type="text" class="form-control" name="altura" value="<?= $pokemon->height; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach ($pokemon->types as $item): ?>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tipo</label>
                        <input type="text" class="form-control" name="tipo[]" value="<?= $item->type->name; ?>" readonly>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="row">
                <button class="btn btn-primary" type="submit">Favoritar</button>&nbsp;
                <a class="btn btn-success" href="/">Home</a>
            </div>
        </div>
    </div>
</form>


<?php view('layout/footer'); ?>
