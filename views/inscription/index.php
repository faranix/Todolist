<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/styles/css/connexion-inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div class="box">
        <div class="box__top">
            <a class="box__top__lien" href="/connexion/index">Connexion</a>
            <a class="box__top__lien" href="/inscription/index">Inscription</a>
        </div>
        <div class="box__center">
            <form action="" method="post">
                <div class="box__center__input">
                    <label for="email-inscription">Email:</label>
                    <input type="email" name="email-inscription" required>
                </div>
                <div class="box__center__input">
                    <label for="password-inscription">Mot de passe:</label>
                    <input type="password" name="password-inscription" required>
                </div>
                <div class="box__center__btn">
                    <button type='submit'>Inscription</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>