<?php
	$valor1 = (double) 0;
	$valor2 = (double) 0;
	$resultado = (double) 0;
	$operadores = "";

	if(isset($_POST['btncalc'])){

		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		$operadores = $_POST['rdocalc'];

		if($_POST['txtn1'] == "" || $_POST['txtn2'] == "")
		{
			echo('<p class="msgErro">É obrigatório preencher todos os campos para efetuar o seu calculo!</p>');
		
		}else{
		
		if(!is_numeric($valor1) || !is_numeric($nota2))
		{
			echo('<p class="msgErro">Para realizar o calculo, todos os dados devem estar validos!</p>');

		}else{

		$soma = ($valor1 + $valor2);
		$subtrair = ($valor1 - $valor2);
		$multiplicar = ($valor1 * $valor2);
		$dividir = ($valor1 / $valor2);
		
		if(strchr($operadores, 'somar')){
			$resultado = $soma;
		}else if(strchr($operadores, 'subtrair')){
			$resultado = $subtrair;
		}else if(strchr($operadores, 'multiplicar')){
			$resultado = $multiplicar;
		}else{
			$resultado = $dividir;
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
						Valor 1:<input type="text" name="txtn1" value="0" > <br>
						Valor 2:<input type="text" name="txtn2" value="0" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" checked>Somar <br>
							<input type="radio" name="rdocalc" value="subtrair" >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" >Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" >Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
						O resultado é: <?php  echo($resultado); ?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

