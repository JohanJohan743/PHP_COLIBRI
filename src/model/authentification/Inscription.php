<?php

class Inscription {
  public function GetInscription() {
    require_once('model/mysql_config.php');

    if (!isset($_SESSION)) {
        session_start();
    };

    if (isset($_POST['Inscription'])) {

      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail_confirmation']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp_confirmation']);

      if (!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail_confirmation']) and !empty($_POST['mdp']) and !empty($_POST['mdp_confirmation'])) {
          $bdd = new PDO(DSN, LOGIN, MOT_DE_PASSE);
          $pseudolength = strlen($pseudo);
          if ($pseudolength <= 255) {
              if ($mail == $mail2) {
                  if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                      $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                      $reqmail->execute(array($mail));
                      $mailexist = $reqmail->rowCount();
                      if ($mailexist == 0) {
                          if ($mdp == $mdp2) {
                              $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                              $insertmbr->execute(array($pseudo, $mail, $mdp));
                              header("location: ?connexion");
                              //  $erreur = "Votre compte a bien été créé ! <a href=\"?connexion\">Me connecter</a>";
                          } else {
                              $erreur = "Vos mots de passes ne correspondent pas !";
                              $_SESSION["erreur"]= $erreur;
                              header("location: ?inscription");
                          }
                      } else {
                          $erreur = "Adresse mail déjà utilisée !";
                          $_SESSION["erreur"]= $erreur;
                          header("location: ?inscription");
                      }
                  } else {
                      $erreur = "Votre adresse mail n'est pas valide !";
                      $_SESSION["erreur"]= $erreur;
                      header("location: ?inscription");
                  }
              } else {
                  $erreur = "Vos adresses mail ne correspondent pas !";
                  $_SESSION["erreur"]= $erreur;
                  header("location: ?inscription");
              }
          } else {
              $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
              $_SESSION["erreur"]= $erreur;
              header("location: ?inscription");
          }
      } else {
          $erreur = "Tous les champs doivent être complétés !";
          $_SESSION["erreur"]= $erreur;
          header("location: ?inscription");
      }
  }
}
}
