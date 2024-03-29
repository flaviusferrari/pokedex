<?php view('layout/header'); ?>

<h2>Digite o nome de um Pokemon</h2>

<form action="/pokemon" method="post">
    <div class="form-group">
        <label for="nome">Nome do Pokemon</label>
        <input type="text" class="form-control" name="pokemon"> 
        <?php if(isset($error)): ?> 
            <br>
            <div class="alert alert-danger" role="alert">
                <?= errorMessage($error); ?>            
            </div>      
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Buscar</button>
    <a class="btn btn-success" href="pokemon/list">Listar</a>
</form>
<hr>

<?php view('layout/footer'); ?>
