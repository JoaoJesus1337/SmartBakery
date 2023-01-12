<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="refresh" content="30">
        <title><?php if ($_GET['area'] == "padaria") echo "Padaria";  elseif ($_GET['area'] == "pao1") echo "Pão 1"; elseif ($_GET['area'] == "pao2") echo "Pão 2"; elseif ($_GET['area'] == "pao3") echo "Pão 3";?> - Historico de Temperatura/Humidade</title> <!--verifica qual a area a apresentar -->
        <link rel="shortcut.icon" type="image/x-icon" href="favicon.ico"/>
		<link rel="shortcut.icon" type="image/x-icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/styles1.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Roboto:wght@300&display=swap"
    rel="stylesheet">
    </head>
    <body>
        <h1><?php if ($_GET['area'] == "padaria") echo "Padaria";  elseif ($_GET['area'] == "pao1") echo "Pão 1"; elseif ($_GET['area'] == "pao2") echo "Pão 2"; elseif ($_GET['area'] == "pao3") echo "Pão 3";?> - Historico de Temperatura/Humidade</h1> <!--verifica qual a area a apresentar -->
		<div>
			<h3>Estado (Data de atualização)</h3>
			<p>
				<?php 
					$array = explode("#",file_get_contents("files/historico_".$_GET['area'].".txt")); //divide o valor recebido num array
					$size = count($array); //retorna o tamanho do array
					
					for($i = -3; $i <= $size - 6; $i = $i + 3){ // apresenta todos os valores do array
						echo nl2br('<h6>'.$array[$i + 3]." ºC - ".$array[$i + 4]." % - Data: ".$array[$i + 5].'</h6>');
					}
				?>
			</p>
		</div>
	<br>
	<div class="btn">
		<button type="submit"><a href="index.php">Página Inicial</a></button>
	</div>
    </body>
</html>