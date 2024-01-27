<?php view('layout/header'); ?>

<h2>Digite o nome de um Pokemon</h2>

<form action="/pokemon" method="post">
    <label for="nome">Nome do Pokemon</label>
    <input type="text" name="pokemon" id="">

    <button type="submit">Enviar</button>
</form>
<hr>
<a href="pokemon/list">Listar</a>

<?php view('layout/footer'); ?>
