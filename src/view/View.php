<?php

class View {

	protected $router;
	protected $title;
	protected $content;

	public function __construct(Router $router) {
		$this->router = $router;
		$this->title = null;
		$this->content = null;
	}

	public function render() {
		$title = $this->title;
		$content = $this->content;

				$menu = array(
							"Accueil" => $this->router->getHomeURL(),
							"Inscription" => $this->router->Inscription(),
							"Connexion" => $this->router->Connexion(),
				);

		include("template.php");
	}

	public function makeHomePage() {

		$this->title = "MON SUPER SITE";
    $this->content .= '<div id="container">';
    $this->content .= '<div class="row">';
		$this->content .= "<div class='cell2'> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus. </div>";
		$this->content .= "<div class='cell1'> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus. </div>";
    $this->content .= '</div>';
    $this->content .= '<div class="row">';
		$this->content .= "<div class='cell1'> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus. </div>";
		$this->content .= "<div class='cell2'> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus. </div>";
    $this->content .= '</div>';
    $this->content .= '<div class="row">';
    $this->content .= "<div class='cell2'> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus. </div>";
    $this->content .= "<div class='cell1'> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus doloribus architecto quod ex aliquam placeat inventore amet pariatur voluptatibus quisquam dolorum et beatae cupiditate, fugiat ipsa enim. Voluptatum, consequuntur accusamus. </div>";
    $this->content .= '</div>';
    $this->content .= '</div>';

	}

	public function Connexion() {

		$this->title = "MON SUPER SITE";
		$this->content .= "<form method='POST' action=' '>";
		$this->content .= "<fieldset>";
		$this->content .= "<legend>Formulaire de connexion</legend>";
		$this->content .= "<input type='text' name='login' placeholder='Login' required/>";
		$this->content .= "<input type='password' name='mdp' placeholder='Mot de passe' required/>";
		$this->content .= "<input type='submit' name='formconnexion' value='Se connecter !' />";
		$this->content .= "</fieldset>";
		$this->content .= "</form>";

	}


	public function Inscription(){

		$this->title = "MON SUPER SITE";
		$this->content .= "<form method='POST' action=''>";
		$this->content .= "<fieldset>";
		$this->content .= "<legend>Formulaire d'Inscription</legend>";
		$this->content .= "<p>";
		$this->content .= "<label for='pseudo'>Login :</label>";
    $this->content .= "<input type='text' placeholder='Votre pseudo' name='pseudo' id='pseudo' value=''/>";
		$this->content .= "</p>";
		$this->content .= "<p>";
		$this->content .= "<label for='mail'>Mail :</label>";
		$this->content .= "<input type='email' placeholder='Votre mail' name='mail' id='mail' value=''/>";
		$this->content .= "</p>";
		$this->content .= "<p>";
		$this->content .= "<label for='mail2'>Confirmation du Mail : </label>";
		$this->content .= "<input type='email' placeholder='Confirmez votre mail' name='mail_confirmation' id='mail_confirmation' value=' '/>";
		$this->content .= "</p>";
		$this->content .= "<p>";
		$this->content .= "<label for='mdp'>Votre mot de passe : </label>";
		$this->content .= "<input type='password' placeholder='Votre mdp' name='mdp' id='mdp' />";
		$this->content .= "</p>";
		$this->content .= "<p>";
		$this->content .= "<label for='mdp2'>Confirmation de Votre mot de passe  : </label>";
		$this->content .= "<input type='password' placeholder='Confirmez Votre mdp' name='mdp_confirmation' id='mdp_confirmation' />";
		$this->content .= "</p>";
		$this->content .= "<p>";
		$this->content .= "<input type='submit' name='Inscription' value='Inscription' />";
		$this->content .= "</p>";
		$this->content .= "</fieldset>";
		$this->content .= "</form>";

	}

	public function makeUnknownPage() {
		$this->title = "Erreur";
		$this->content = "Le page demandé n'existe pas.";
	}

}

?>
