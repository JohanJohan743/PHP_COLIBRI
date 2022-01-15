<?php

require_once("Router.php");

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

	public function makeUnknownPage() {
		$this->title = "Erreur";
		$this->content = "Le page demandé n'existe pas.";
	}


}

?>
