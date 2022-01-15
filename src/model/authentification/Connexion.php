<?php

class Connexion {
  public function GetConnexion() {

  require_once('model/mysql_config.php');
  if (!isset($_SESSION)) {
      session_start();
  };

  if (isset($_POST['formconnexion'])) {
      $bdd = new PDO(DSN, LOGIN, MOT_DE_PASSE);

      $login = htmlspecialchars($_POST['login']);
      $mdp = sha1($_POST['mdp']);

    if (!empty($login) AND !empty($mdp)) {
       $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
       $requser->execute(array($login, $mdp));
       $userexist = $requser->rowCount();

          if ($userexist == 1) {
              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo['id'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              header("location: ?.");
          }
          else {
              $erreur = "Erreur dans votre login ou mot de passe !";
              $_SESSION["erreur_co"]= $erreur;
              header("location: ?connexion");
          }
       }
     }
   }
}
