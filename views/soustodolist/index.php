<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/styles/css/todolist.css">
    <link rel="stylesheet" href="/styles/css/todo.css">

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
        <h2 class="todolist-actuel">Liste actuelle</h2>
        <div class="add-todolist">
            <form action="" method="post">
                <input name="addInSousTodoList" type="text" placeholder="Entrée vos tâches à faire pour la liste :" required>
                <button type="submit">Ajouter</button> 
            </form>
        </div>
        <div class="view-todolist">
            <?php if ($sousTodoList) { foreach ($sousTodoList as $sousTodo): ?>
                <div class="view-todolist__todo">
                    <a href="/todolist/index" class="view-todolist__todo__view">Retour</a>
                    <p class="view-todolist__todo__date"><?= $sousTodo['date_time'] ?></p>
                    <form class="view-todolist__todo__edit" action="/soustodolist/modify/<?php echo $sousTodo["id"] ?>" method="post">
                        <input class="view-todolist__todo__edit__title" name="editSousTodo" value="<?= $sousTodo['title'] ?>" required></input>
                        <button type="submit" class="view-todolist__todo__edit__add">Modifier</button>
                    </form>
                    <a href="/soustodolist/delete/<?php echo $sousTodo["id"] ?>" class="view-todolist__todo__delete">Supprimer</a>
                </div>
            <?php endforeach; } else { ?>
                    <a href="/todolist/index" class="view-todolist__todo__view view-2">Retour</a>
               <?php } ?>
        </div>
    </main>
</body>
</html>