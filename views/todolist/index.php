<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/styles/css/todolist.css">

    <title>Todolist</title>
</head>
<body>
    <header class="header">
        <h1 class="header__title">Todolist</h1>
        <form class="header__deconnexion" action="" method="post">
            <button type="submit" name="deconnexion" class="header__deconnexion__btn">Déconnexion</button>
        </form>
    </header>

    <main>
        <div class="add-todolist">
            <form method="post">
                <input name="addInTodoList" type="text" placeholder="Entrée votre liste de choses à faire" required>
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div class="view-todolist">
            <?php foreach ($todolists as $todo): ?>
                <div class="view-todolist__todo">
                    <a href="/todolist/todo/<?php echo $todo["id"] ?>" class="view-todolist__todo__view">Voir</a>
                    <p class="view-todolist__todo__title"><?= $todo['title'] ?></p>
                    <p class="view-todolist__todo__date"><?= $todo['date_time'] ?></p>
                    <a href="" class="view-todolist__todo__add">Modifier</a>
                    <a href="/todolist/delete/<?php echo $todo["id"] ?>" class="view-todolist__todo__delete">Supprimer</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>