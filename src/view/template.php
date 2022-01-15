<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="skin/style.css" />

</head>
<body>
	<nav class="menu">
		<ul>
			<?php
				foreach ($menu as $text => $link) {
					echo "<li><a href=\"$link\">$text</a></li>";
				}
			?>
		</ul>
	</nav>
	<main>
		<h1><?php echo $title; ?></h1>
		<?php echo $content; ?>
	</main>

	<footer class = "footer">
			<p>Copyright © 2021 Mon-super-site.fr</p>
	</footer>

</body>
</html>
