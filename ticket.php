<?php
include_once 'autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
 
class imprimir{

	public function imprimirdoc($visitante,$identificacion,$numoficina,$titular,$asunto,$entrada){
	$nombre_impresora = "EPSON TM-T20II Receipt"; 
	
	
	$connector = new WindowsPrintConnector($nombre_impresora);
	$printer = new Printer($connector);
	
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	
	/*
		Intentaremos cargar e imprimir
		el logo
	*/
	try{
		$logo = EscposImage::load("img/logo.jpg", true);
		$printer->bitImage($logo);
	}catch(Exception $e){/*No hacemos nada si hay error*/}

	$printer->text("Torre Animas" . "\n");
	$printer->text("Blvd. Cristobal Colon 5" . "\n");
	$printer->text("Col. Rubi Animas" . "\n");
	$printer->text("C.P. 91190 Xalapa, Veracruz" . "\n");
	#La fecha también

	date_default_timezone_set('America/Mexico_City');
	$mes=array("","Enero",
	"Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			
	$printer->text(date('d')." de ". $mes[date('n')]. " de " . date('Y') . "\n");
	$hora=date("H:i:s");
	$printer->text($hora."\n");

	//$visitante="ISRAEL IVAN ROMERO AGUILAR";
	//$identificacion="5665566555";
	//$numoficina="501";
	//$titular="Inm Bosque de las Animas";
	//$asunto="Personal";

	//$entrada="2020-06-01 16:50:00";

	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text("Visitante" . "\n");
	$printer->text( $visitante . "\n");
	$printer->text("Identificación" . "\n");
	$printer->text( $identificacion . "\n");
	$printer->text("No. Oficina" . "\n");
	$printer->text( $numoficina . "\n");
	$printer->text("Oficina" . "\n");
	$printer->text( $titular . "\n");
	$printer->text("Motivo de la Visita" . "\n");
	$printer->text( $asunto . "\n");
	$printer->text("Hora de Entrada" . "\n");
	$printer->text( $entrada . "\n");

	$printer->setJustification(Printer::JUSTIFY_CENTER);

	$printer->text("Gracias por su visita");

	$printer->feed(3);

	$printer->cut();
	
	$printer->pulse();
	
	$printer->close();
	}
}
?>