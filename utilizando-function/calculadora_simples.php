<?php
	//permite fazer a importação de arquivos no PHP. 
	//Utilizando a opção com _once, o servidor realiza uma restrição 
	//para importar somente uma vez o arquivo (melhor opção).

	//import do arquivo de funções para calculos matemáticos
	require_once('modulo/calculos.php');
	//import do arquivo de configurações de variaveis e constantes
	require_once('modulo/config.php');

	$valor1 = (double) 0;
	$valor2 = (double) 0;
	$resultado = (double) 0;
	$opcao = (string) null;

	if(isset($_POST['btncalc'])){

		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		
		// validação de tratamento de erro para caixa vazia
		if($_POST['txtn1'] == '' || $_POST['txtn2'] == '')

			echo(ERRO_MSG_CAIXA_VAZIA);
		else{
			// validação de tratamento de erro para rdo sem escolha
			if(!isset($_POST['rdocalc']))

				echo(ERRO_MSG_OPERACAO_CALCULO);

			else{

				// validação para tratamento de erro para dados incorreto

				if(!is_numeric($valor1) || !is_numeric($valor2))

					echo(ERRO_MSG_CARACTER_INVALIDO_TEXTO);

				else{

					// Apenas podemos receber o valor do rdo quando ele existir
						$opcao = strtoupper($_POST['rdocalc']);

					// Chamada para a função que vai realizar os calculos matemáticos
					$resultado = operacaoMatematica($valor1, $valor2, $opcao);
						
					}
				}
			}
		}

?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - Simples</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="POST" action="calculadora_simples.php">
						Valor 1:<input type="text" name="txtn1" value="<?=$valor1;?>"> <br>
						Valor 2:<input type="text" name="txtn2" value="<?=$valor2;?>"> <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" <?=$opcao == 'SOMAR'?'checked':null;?> >Somar <br>
							<input type="radio" name="rdocalc" value="subtrair" <?=$opcao == 'SUBTRAIR'?'checked':null;?> >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" <?=$opcao == 'MULTIPLICAR'?'checked':null;?> > Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" <?=$opcao == 'DIVIDIR'?'checked':null;?> >Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
						O resultado é: <?=$resultado;?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

