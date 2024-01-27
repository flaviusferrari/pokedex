<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
    <h2>Digite o nome de um Pokemon</h2>

    <form action="/pokemon" method="post">
        <label for="nome">Nome do Pokemon</label>
        <input type="text" name="pokemon" id="">

        <button type="submit">Enviar</button>
    </form>
    <hr>
    <a href="pokemon/list">Listar</a>
</body>
</html>