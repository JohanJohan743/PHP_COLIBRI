<?php

class Contact {
  public function GetContact() {
      require_once('model/mysql_config.php');

      if (!isset($_SESSION)) {
          session_start();
      };

      if (isset($_POST['Contact'])) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $sujet = htmlspecialchars($_POST['sujet']);
        $message = htmlspecialchars($_POST['message']);

        if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) and !empty($_POST['sujet']) and !empty($_POST['message'])) {

            $bdd = new PDO(DSN, LOGIN, MOT_DE_PASSE);
            $nomlength = strlen($nom);
            $prenomlength = strlen($prenom);
            $sujetlength = strlen($sujet);
            $messagelength = strlen($message);

            if ($nomlength <= 255 and $prenomlength <= 255 and $sujetlength <= 255 ) {
              if ($messagelength <= 1020) {
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $insertmbr = $bdd->prepare("INSERT INTO contact(nom, prenom, mail, sujet, message) VALUES(?, ?, ?, ?, ?)");
                        $insertmbr->execute(array($nom, $prenom, $mail , $sujet, $message ));
                        header("location: ?.");
                    } else {
                        $erreur = "Votre adresse mail n'est pas valide !";
                        $_SESSION["erreur_contact"]= $erreur;
                        header("location: ?contact");
                    }
                 }else {
                       $erreur = "Votre message ne doit pas dépasser 1020 caractères !";
                       $_SESSION["erreur_contact"]= $erreur;
                       header("location: ?contact");
                 }
            } else {
                $erreur = "Vos nom/prénom/sujet ne doivent pas dépasser 255 caractères !";
                $_SESSION["erreur_contact"]= $erreur;
                header("location: ?contact");
            }
         } else {
            $erreur = "Tous les champs doivent être complétés !";
            $_SESSION["erreur_contact"]= $erreur;
            header("location: ?contact");
        }
      }
   }
}
