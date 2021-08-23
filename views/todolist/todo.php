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
        <div class="header__box">
            <form class="header__deconnexion" action="" method="post">
                <button type="submit" name="deconnexion" class="header__deconnexion__btn">Déconnexion</button>
            </form>
        </div>
    </header>

    <main>
        <h2 class="todolist-actuel">Liste actuelle: <?php echo $todoList['title'] ?></h2>
        <div class="add-todolist">
            <form action="" method="post">
                <input name="addInSousTodoList" type="text" placeholder="Entrée vos tâches à faire pour la liste : <?php echo $todoList['title'] ?>" required>
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div class="view-todolist">
            <?php foreach ($sousTodoList as $sousTodo): ?>
                <div class="view-todolist__todo">
                    <a href="/todolist/index" class="view-todolist__todo__delete">Retour</a>
                    <p class="view-todolist__todo__title"><?= $sousTodo['title'] ?></p>
                    <p class="view-todolist__todo__date"><?= $sousTodo['date_time'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>