<!DOCTYPE html>

	<?php
	
		include('php/sessione.php');	//fa partire la sessione 
	
	?>

<html>

	<head>
		<meta http-equip="Content-Type" content="text/html; charset=utf-8">
		
		<!-- selezione degli stili css-->
		<link rel="stylesheet" type="text/css"	href="view/css/style.css" media="screen">	
		<link rel="stylesheet" type="text/css"	href="view/css/background.css" media="screen">	
		<link rel="stylesheet" type="text/css"	href="view/css/testo.css" media="screen">	


		<title>GoodStore.net</title>  <!-- il titolo è un richiamo non troppo velato. AHAH-->
	</head>

	<body>

		<div class='homepage'>
			
				<?php include('view/testata.php'); ?>

			</div>
		
			<div class='colonne'>
				<div class='colonnaSinistra'> </div>
				<div class='colonnaDestra'> </div>				
				<div class='centro'> <p>GoodStore.net</p> </div>
				</div>
		</div>
		
		<!-- visualizzazione del footer -->
		<?php include('view/footer.php'); ?>


	</body> 
	 
 </html>
