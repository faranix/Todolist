<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../../styles/css/connexion-inscription.css">
    <title>Connexion</title>
</head>
<body>
    <div class="box">
        <div class="box__top">
            <a class="box__top__lien" href="http://localhost:8888/connexion">Connexion</a>
            <a class="box__top__lien" href="http://localhost:8888/inscription">Inscription</a>
        </div>
        <div class="box__center">
            <form action="" method="post">
                <div class="box__center__input">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="box__center__input">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="box__center__input">
                <?php
                    // Affiche un message si le mot de passe est incorrect
                    if (isset($error)) {
                        echo "<div class='box__center__message'>" . $error . "</div>";
                    }
                ?>
                <div class="box__center__btn">
                    <button type='submit'>Connexion</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>