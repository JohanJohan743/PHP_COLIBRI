<?php

require_once("view/View.php");
require_once("control/Controller.php");

if (!isset($_SESSION)) { session_start(); };

class Router {

	private $view;

	public function main() {

		$this->view = new View($this);
		$this->controller = new Controller();

		try {

			if (key_exists('connexion', $_GET)) {

				$this->view->Connexion();

			}elseif (key_exists('inscription', $_GET)) {

			  $this->view->Inscription();

			} elseif (key_exists('deconnexion', $_GET)) {

			  $this->controller->deconnexion();

			}  elseif (key_exists('demandeConnexion', $_GET)) {

				$this->controller->connexion();

			} elseif (key_exists('demandeInscription', $_GET)) {

				$this->controller->inscription();

			} else {

				$this->view->makeHomePage();

			}
		} catch (Exception $e) {

			$this->view->makeUnknownPage($e);

		}

		$this->view->render();

	}

	public function getHomeURL() {
		return ".";
	}

	public function Connexion(){
			return "?connexion";
	}

	public function Deconnexion(){
			return "?deconnexion";
	}

	public function Inscription(){
			return "?inscription";
	}


	public function getGestionConnexionURL(){
			return "?demandeConnexion";
	}

	public function getGestionInscriptionURL(){
			return "?demandeInscription";
	}



}

?>
