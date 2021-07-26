<?php

function formata_dinheiro($valor) {
    $valor = number_format($valor, 2, ',', '');
    return "R$ " . $valor;
}

function mostraMes($m) {
    switch ($m) {
        case 1: $mes = "JAN";
            break;
        case 2: $mes = "FEV";
            break;
        case 3: $mes = "MAR";
            break;
        case 4: $mes = "ABR";
            break;
        case 5: $mes = "MAI";
            break;
        case 6: $mes = "JUN";
            break;
        case 7: $mes = "JUL";
            break;
        case 8: $mes = "AGO";
            break;
        case 9: $mes = "SET";
            break;
        case 10: $mes = "OUT";
            break;
        case 11: $mes = "NOV";
            break;
        case 12: $mes = "DEZ";
            break;
   }
    return $mes;
}

function isDiaDoMes($dia, $mes){
	$meses['01'] = 31;
	$meses['02'] = 28;
	$meses['03'] = 31;
	$meses['04'] = 30;
    $meses['05'] = 31;
	$meses['06'] = 30;
	$meses['07'] = 31;
	$meses['08'] = 31;
	$meses['09'] = 30;
	$meses['10'] = 31;
	$meses['11'] = 30;
	$meses['12'] = 31;
	if($dia >= $meses[$mes]){
		return $meses[$mes];
	}
}

$nomMes['01'] = 'Janeiro';
$nomMes['02'] = 'Fevereiro';
$nomMes['03'] = 'Março';
$nomMes['04'] = 'Abril';
$nomMes['05'] = 'Maio';
$nomMes['06'] = 'Junho';
$nomMes['07'] = 'Julho';
$nomMes['08'] = 'Agosto';
$nomMes['09'] = 'Setembro';
$nomMes['10'] = 'Outubro';
$nomMes['11'] = 'Novembro';
$nomMes['12'] = 'Dezembro';

?>
