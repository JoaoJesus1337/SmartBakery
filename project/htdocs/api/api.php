<?php
header('Content-Type: text/html; charset=utf-8');

if($_SERVER['REQUEST_METHOD'] == "POST") //verifica o tipo de metodo a ser utilizado
{
    print_r($_POST);
	
	if($_POST['area'] == "controlo" && isset($_POST["porta_entrada"]) && isset($_POST["janela1"]) && isset($_POST["ventoinha"])){ //caso a area seja igual a controlo actualiza os valores da porta_entrada, janela1 e ventoinha
		file_put_contents("../files/porta_entrada.txt",$_POST["porta_entrada"]);
		file_put_contents("../files/janela1.txt",$_POST["janela1"]);
		file_put_contents("../files/ventoinha.txt",$_POST["ventoinha"]);
	}
    else if($_POST["area"] && isset($_POST["temperatura"]) && isset($_POST["humidade"]) && isset($_POST["data"])) // caso a primeira condicao nao se verifique. caso as variaveis temperatura, humidade e data estejam definidas sao escritos os valores para os ficheiros
    {
			file_put_contents("../files/historico_".$_POST["area"].".txt",$_POST["temperatura"]."#".$_POST["humidade"]."#".$_POST["data"]."#".PHP_EOL, FILE_APPEND);
    }
    else //caso nenhuma das condicoes anteriores se verifique 
    {
        echo('{"erro": "Os parametros recebidos nao sao validos!"}'.PHP_EOL);
    }
}
else if($_SERVER['REQUEST_METHOD'] == "GET") // caso o metedo seja GET executa aqui
{
    if(isset($_GET['area'])) //verifica se a area tem algum valor e retorna os valores inseridos no respectivo ficheiro
    {
		
        echo $_GET['area']."#".file_get_contents("../files/historico_".$_GET['area'].".txt");
    }
    else // caso a primeira condicao nao se verifique
    {
        http_response_code(400);
        echo('{"erro": "Faltam parametros no GET!"}'.PHP_EOL);
    }
}
else // caso não exista nenhum metodo
{
    http_response_code(400);
    echo('{"erro": "Metodo '.$_SERVER['REQUEST_METHOD'].'nao permitido!"}'.PHP_EOL);
}
?>