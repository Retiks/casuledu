<?php
include '../sql/sql.php';
include '../crypt/crypt.php';
include '../crypt/key.php';
include '../session.php';
require('../nav_bar.php');
session_start();
$infos = getInfoClient($_SESSION['id']);
?>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Profile</title>
</head>

<body id="profile">
  <main>
    <h1>Mon profil</h1>
    <?php if ($_SESSION['updateProfileSucces']) : ?>
      <div class="success-message">
        <h2>Succès !</h2>
        <p>Vous avez bien modifié votre profile.</p>
      </div>
    <?php endif ?>
    <?php if ($_SESSION['updateProfileFail']) : ?>
      <div class="error-message">
        <p>Les mots de passes ne sont pas identiques !</p>
      </div>
    <?php endif ?>
    
    <form action="profile_post.php" method="post">
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo decrypt($infos['last_name'], getKeyCrypt()); ?>">
      </div>
      <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo decrypt($infos['first_name'], getKeyCrypt()); ?>">
      </div>
      <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" class="form-control" value="<?php echo decrypt($infos['address'], getKeyCrypt()); ?>">
      </div>
      <div class="form-group">
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" class="form-control" value="<?php echo decrypt($infos['phone'], getKeyCrypt()); ?>">
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email" class="form-control" value="<?php echo $infos['email']; ?>">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirmer le mot de passe :</label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="sexe">Sexe :</label>
          <select name="sexe" id="sexe" class="form-control">
            <option value="h" <?php if (decrypt($infos['sexe'], getKeyCrypt()) == "h") echo "selected"; ?>>Homme</option>
            <option value="f" <?php if (decrypt($infos['sexe'], getKeyCrypt()) == "f") echo "selected"; ?>>Femme</option>
          </select>
        </div>
        <div class="form-group">
          <label for="date_naissance">Date de naissance :</label>
          <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="<?php echo decrypt($infos['dateNaiss'], getKeyCrypt()); ?>">
        </div>
        <div class="form-group">
          <button type="submit" class="btn">Enregistrer</button>
        </div>
    </form>
  </main>
</body>

</html>
<?php
unset($_SESSION['updateProfileSucces']);
unset($_SESSION['updateProfileFail']);
?>