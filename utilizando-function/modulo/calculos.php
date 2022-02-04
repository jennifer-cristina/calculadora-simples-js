<?php
/*************************************************************************************
 * Objetivo: Arquivo de funções matemáticas que poderá ser utilizado dentro do projeto
 * Autor: Jennifer Cristina
 * Data: 04/02/2022
 * Versão: 1.0
 ****************************************************/

 // Criando uma função para calcular as operações matemáticas  
 function operacaoMatematica($numero1, $numero2, $operacao){

//import do arquivo de configurações de variaveis e constantes
require_once('modulo/config.php');

    // Declaração de variaveis locais da função
    $num1 = (double) $numero1;
    $num2 = (double) $numero2;
    $tipoCalculo = (string) $operacao;
    $result = (double) 0;

    switch($tipoCalculo) {
        case 'SOMAR':
            $result = $num1 + $num2;
            break;

        case 'SUBTRAIR':
            $result = $num1 - $num2;
            break;

        case 'MULTIPLICAR':
            $result = $num1 * $num2;
            break;

        case 'DIVIDIR':
            if($num2 == 0)
                echo(ERRO_MSG_DIVISAO_ZERO);
            else
                $result = $num1 / $num2;
            
            break;

        default:
            // Processamento caso não entre em nenhuma das opções
        }			

        // round() - permite limitar a qtde de casas decimais de um valor, além de arredondar o valor quando necessário
        $result = round($result, 2);

    return $result;
}







?>