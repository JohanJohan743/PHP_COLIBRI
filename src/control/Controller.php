<?php

require_once("model/authentification/Connexion.php");
require_once("model/authentification/Deconnexion.php");
require_once("model/authentification/Inscription.php");
require_once("model/Contact.php");

if (!isset($_SESSION)) {
    session_start();
};

class Controller {

public function connexion() {
    $this->control = new Connexion();
    $this->control->GetConnexion();
  }

public function inscription() {
    $this->inscription = new Inscription();
    $this->inscription->GetInscription();
  }

public function deconnexion() {
    $this->deco = new Deconnexion();
    $this->deco->GetDeconnexion();
  }

public function contact() {
    $this->contact = new Contact();
    $this->contact->GetContact();
  }

}
