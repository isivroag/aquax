<?php

 
class imprimir{

	public function imprimirdoc($visitante,$identificacion,$numoficina,$titular,$asunto,$entrada){
	
	
	
	/*
		Intentaremos cargar e imprimir
		el logo
	*/
	

	echo ("Torre Animas" . "\n");
	echo ("Blvd. Cristobal Colon 5" . "\n");
	echo ("Col. Rubi Animas" . "\n");
	echo ("C.P. 91190 Xalapa, Veracruz" . "\n");
	#La fecha también

	date_default_timezone_set('America/Mexico_City');
	$mes=array("","Enero",
	"Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			
	echo (date('d')." de ". $mes[date('n')]. " de " . date('Y') . "\n");
	$hora=date("H:i:s");
	echo ($hora."\n");

	//$visitante="ISRAEL IVAN ROMERO AGUILAR";
	//$identificacion="5665566555";
	//$numoficina="501";
	//$titular="Inm Bosque de las Animas";
	//$asunto="Personal";

	//$entrada="2020-06-01 16:50:00";

	
	echo ("Visitante" . "\n");
	echo ( $visitante . "\n");
	echo ("Identificación" . "\n");
	echo ( $identificacion . "\n");
	echo ("No. Oficina" . "\n");
	echo ( $numoficina . "\n");
	echo ("Oficina" . "\n");
	echo ( $titular . "\n");
	echo ("Motivo de la Visita" . "\n");
	echo ( $asunto . "\n");
	echo ("Hora de Entrada" . "\n");
	echo ( $entrada . "\n");

	

	echo ("Gracias por su visita");

	
	}
}
?>