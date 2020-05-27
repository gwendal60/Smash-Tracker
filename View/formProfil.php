<div class="contenu">
    <?php
    if ($action == 'Modifier') {
      ?>
      <h2>Modification d'un compte</h2>
      <form action="index.php?uc=gestionDuProfil&action=Modifier&idUtilisateur=$idUtilisateur" method="post">
      <p>
        <label for="txt_login">Login</label>
        <input type="text" name="txt_login" value="<?php if ($action == "Modifier") { echo $utilisateur['pseudo']; }  ?>" required>
      </p>
      <?php
    } else {
      ?>
      <h2>Création d'un compte</h2>
      <form action="index.php?uc=gestionDuProfil&action=CreerSonProfil" method="post">
      <p>
        <label for="txt_login">Login</label>
        <input type="text" name="txt_login" required>
      </p>
      <p>
        <label for="txt_mdp">Mot de passe</label>
        <input type="password" name="txt_mdp" required>
      </p>
      <?php
    }
    ?>
      <p>
        <input type="submit" name="btn_valider" value="Valider">
        <input type="reset" name="annuler" value="Annuler">
      </p>
    </form>
</div>