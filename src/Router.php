<?php

require_once("view/View.php");

class Router {

	private $view;

	public function main() {

		$this->view = new View($this);

		try {

			if (key_exists('connexion', $_GET)) {

				$this->view->Connexion();

			}elseif (key_exists('inscription', $_GET)) {

			  $this->view->Inscription();

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

	public function Inscription(){
			return "?inscription";
	}



}

?>
