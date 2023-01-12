<!DOCTYPE html>
<?php
	$page = $_SERVER['PHP_SELF']."?area=".$_GET['area']; // define uma variavel com a pagina actual e o tempo para que a pagina actualize autmaticamente 
	$sec = "5";
?>
<html>
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <title><?php if ($_GET['area'] == "padaria") echo "Padaria";  elseif ($_GET['area'] == "pao1") echo "Pão 1"; elseif ($_GET['area'] == "pao2") echo "Pão 2"; elseif ($_GET['area'] == "pao3") echo "Pão 3";?> - Controlo de Temperatura/Humidade</title> <!--verifica qual a area a apresentar -->
        <link rel="shortcut.icon" type="image/x-icon" href="favicon.ico"/>
		<link rel="shortcut.icon" type="image/x-icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/styles1.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Roboto:wght@300&display=swap"
    rel="stylesheet">
    </head>

    <body>
        <h1><?php if ($_GET['area'] == "padaria") echo "Padaria";  elseif ($_GET['area'] == "pao1") echo "Pão 1"; elseif ($_GET['area'] == "pao2") echo "Pão 2"; elseif ($_GET['area'] == "pao3") echo "Pão 3";?> - Controlo de Temperatura/Humidade</h1> <!--verifica qual a area a apresentar -->
		<div>
        <h3>Temperatura Atual:</h3>
		<p>
			<?php
				$array = explode("#",file_get_contents("files/historico_".$_GET['area'].".txt")); //divide o valor recebido num array
				$size = count($array); //retorna o tamanho do array
				echo '<h6>'.$array[$size - 4]." ºC".'</h6>'; // aponta para a ultima posicao de temperatura no array
			?>
		</p>
		<h3>Humidade Atual:</h3>
		<p>
			<?php
				echo '<h6>'.$array[$size - 3]." %".'</h6>'; // aponta para a ultima posicao de humidade no array
			?>
		</p>
		<h3>Data atualização de Temperatura/Humidade:</h3>
		<p>
			<?php 
				echo '<h6>'.$array[$size - 2].'</h6>'; // aponta para a ultima posicao da data no array
			?>
		</P>
		</div>
	<br>
	<div class="btn">
		<button type="submit"><a href="index.php">Página Inicial</a></button>
	</div>
    </body>
</html>