<?php

class Deconnexion {
  public function GetDeconnexion() {
    require_once('model/mysql_config.php');
    if (!isset($_SESSION)) {
        session_start();
    };
    $bdd = new PDO(DSN, LOGIN, MOT_DE_PASSE);

    $_SESSION = array();
    session_destroy();
    header("location: ?.");

  }

}
