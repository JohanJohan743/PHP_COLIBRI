<?php

require_once("view/View.php");

class Router {

	private $view;

	public function main() {

		$this->view = new View($this);


		try {

				$this->view->makeHomePage();


		 } catch (Exception $e) {

			$this->view->makeUnknownPage($e);

		}

		$this->view->render();

	}

}



?>
