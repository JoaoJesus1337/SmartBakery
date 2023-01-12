<!DOCTYPE html>
<?php
	$page = $_SERVER['PHP_SELF']; // define uma variavel com a pagina actual e o tempo para que a pagina actualize autmaticamente 
	$sec = "5";
?>
<html>
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <title>Padaria - Painel de Controlo</title>
        <link rel="shortcut.icon" type="image/x-icon" href="favicon.ico"/>
		<link rel="shortcut.icon" type="image/x-icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/styles1.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Roboto:wght@300&display=swap"
    rel="stylesheet">
    </head>
    <body>
        <h1>Padaria - Painel de Controlo</h1>
		<div>
			<h3></h3>
			<p>
				<?php // verifica os valores dos ficheiros
					echo "<a>Porta de entrada: </a>";
					if(file_get_contents("files/porta_entrada.txt") == 1) // verifica se a porta esta aberta/fechada/trancada
						echo "<h4>Aberta</h4>";
					elseif(file_get_contents("files/porta_entrada.txt") == 2)
						echo "<h5>Fechada/Trancada</h5>";
					else
						echo "<h5>Fechada</h5><h4>Destrancada</h4>";
					echo "<br>";
					echo "<a>Janela : </a>";
					if(file_get_contents("files/janela1.txt") == 1) // verifica se a janela esta aberta/fechada
						echo "<h4>Aberta</h4>";
					else
						echo "<h5>Fechada</h5>";
					echo "<br>";
					echo "<a>Ventoinha: </a>";
					if(file_get_contents("files/ventoinha.txt") == 1) // verifica o estado da ventoinha desligada/velocidade minima/velocidade maxima
						echo "<h4>Velocidade minima</h4>";
					elseif(file_get_contents("files/ventoinha.txt") == 2)
						echo "<h4>Velocidade maxima</h4>";
					else
						echo "<h5>Desligada</h5>";
				?>
			</p>
			<?php
				echo "<a>Webcam: </a><br><br>";
				$directory = "imagens/";
				$filecount = 0;
				$files = glob($directory . "*");
				if ($files){
					$filecount = count($files); // verifica se existem imagens e conta-as
				}
				if($filecount == 0)
				{
					echo "<h5>Inicie o Script da camera!</h5>"; // caso nao existam imagens avisa para iniciar o script
				}
				else
				{
					echo "<img src='imagens/webcam$filecount.jpg'>"; // apresenta a ultima imagem guardada
				}
			?>
		</div>
	<br>
	<div class="btn">
		<button type="submit"><a href="index.php">Página Inicial</a></button>
	</div>
    </body>
</html>