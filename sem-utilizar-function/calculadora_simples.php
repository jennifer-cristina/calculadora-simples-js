<?php
	$valor1 = (double) 0;
	$valor2 = (double) 0;
	$resultado = (double) 0;
	$opcao = (string) null;

	if(isset($_POST['btncalc'])){

		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		
		// validação de tratamento de erro para caixa vazia
		if($_POST['txtn1'] == '' || $_POST['txtn2'] == '')

			echo('<script> alert("Preencha todos os campos para que possa realizar o calculo!"); </script>');

		else{
			// validação de tratamento de erro para rdo sem escolha
			if(!isset($_POST['rdocalc']))

				echo('<script> alert("Por favor escolher uma operação matemática válida!"); </script>');

			else{

				// validação para tratamento de erro para dados incorreto

				if(!is_numeric($valor1) || !is_numeric($valor2))

					echo('<script> alert("Não é possível realizar calculos de dados não númericos!"); </script>');

				else{

					// Apenas podemos receber o valor do rdo quando ele existir
						$opcao = strtoupper($_POST['rdocalc']);

					// Utilização de chaves seria para blocos de códigos, caso haja apenas uma sentença de código não é necessário usar as chaves;

					switch($opcao) {
						case 'SOMAR':
							$resultado = $valor1 + $valor2;
							break;

						case 'SUBTRAIR':
							$resultado = $valor1 - $valor2;
							break;

						case 'MULTIPLICAR':
							$resultado = $valor1 * $valor2;
							break;

						case 'DIVIDIR':
							if($valor2 == 0)
								echo('<script> alert("Não é possível realizar a divisão onde o valor 2 é igual a 0!"); </script>');
							else
								$resultado = $valor1 / $valor2;
							
							break;

						default:
							// Processamento caso não entre em nenhuma das opções
						}	
					}

					// round() - permite limitar a qtde de casas decimais de um valor, além de arredondar o valor quando necessário
					$resultado = round($resultado, 2);
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

